<?php

	/* Creado por Oscar Llorente | ollorente.blogspot.com | oscarllorenteq@yahoo.com.ar */

	require_once( 'includes/_config.php' );

	class Modelo{

		protected $_db;

		public function __construct(){

			$this->_db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

			if( $this->_db->connect_errno ){

				echo 'Fallo al conectar a MSQL:' . $this->_db->connect_error;

			}

			$this->_db->set_charset( DB_CHARSET );

		}

	}

	}

?>
