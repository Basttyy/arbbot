<?php
namespace Basttyy\Arbbot\bot\Traits;

use function Basttyy\Arbbot\bot\logg;

trait CCXTErrorHandler {

  public function __call( $function, $params ) {
    for ( $i = 0; $i < 5; $i++ ) {
      try {
        return call_user_func_array( $this->$function, $params );
      }
      catch ( \Exception $ex ) {
        // For buy() and sell() functions, convert exceptions into null return values.
        if ( $function == 'create_order' &&
             ( $ex instanceof \ccxt\ExchangeError ||
               $ex instanceof \ccxt\NetworkError ) ) {
          // Emulate the log messages that the other exchanges show.
          logg( "[" . strtoupper( $this->id ) . "] Got an exception in " . $params[ 2 ] . "(): " . $ex->getMessage() );
          return null;
        } else if ( $ex instanceof \ccxt\NetworkError ) {
          // Retry!
          continue;
        }
        throw $ex;
      }
    }
  }

}