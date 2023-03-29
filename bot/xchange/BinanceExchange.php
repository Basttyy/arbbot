<?php
namespace Basttyy\Arbbot\bot\xchange;

use Basttyy\Arbbot\bot\Traits\CCXTErrorHandler;

use function Basttyy\Arbbot\bot\generateNonce;

define( 'BINANCE_ID', 9 );

class BinanceExchange extends \ccxt\binance {

  use CCXTErrorHandler;

  public function nonce() {
    return generateNonce( BINANCE_ID );
  }

  public function describe() {

    $info = parent::describe();
    if ( !is_array( @$info[ 'api' ][ 'web' ][ 'post' ] ) ) {
      $info[ 'api' ][ 'web' ][ 'post' ] = array( );
    }
    // Define a private Binance API
    $info[ 'api' ][ 'web' ][ 'post' ][] = 'assetWithdraw/getAsset.html';

    return $info;

  }
}