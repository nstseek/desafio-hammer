<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataGenerator extends CI_Model {
	// Define as propriedades em matrizes.
	private $people = [ "João", "Maria", "Pedro", "Cláudia", "Afonso", "Natália", "Gustavo", "Cristina", "Raul", "Regina" ];
	private $drinks = [ "Café", "Chá", "Água", "Refrigerante" ];
	private $colours = [ "Vermelho", "Verde", "Azul" ];
	private $cars = [ "SUV", "sedan", "hatch" ];
	private $fieldTypes = [ "file", "numeric", "text", "select" ];

	// Retorna o índice aleatório de uma propriedade definida pelo argumento.
	private function getRNDPropVal($prop) {
		$p = null;

		if(!empty($this->{$prop})) $p = $this->{$prop}[$this->getRNDPropIndex($prop)];

		return $p;
	}

	// Retorna o índice aleatório de uma propriedade definida pelo argumento.
	private function getRNDPropIndex($prop) {
		if(isset($this->{$prop})) {
			$i = null;

			if(!empty($this->{$prop})) $i = array_rand($this->{$prop});

			return $i;
		}
		else throw new Exception("Propriedade requisitada não existe.");
	}

	// Retorna um valor aleatório de uma propriedade definida pelo argumento e apaga o valor da propriedade.
	private function getAndUnsetRNDPropVal($prop) {
		$p = null;

		if(!empty($this->{$prop})) {
			$i = $this->getRNDPropIndex($prop);
			$p = $this->{$prop}[$i];
			unset($this->{$prop}[$i]);
		}

		return $p;
	}

	// Checa se o PHP tá afim de retornar uma propridade. Retorna aleatoriamente 0 ou 1 (verdadeiro ou falso).
	private function isPHPFeelingLikeIt() {
		return random_int(0, 1);
	}

	// Sempre vai retornar uma pessoa até que a matriz esteja vazia.
	public function getPerson() {
		$r = $this->getAndUnsetRNDPropVal("people");

		return $r;
	}

	// Joga um cara ou coroa e retorna uma bebida apenas se retorno for verdadeiro.
	public function getDrink() {
		$r = $this->isPHPFeelingLikeIt() ? $this->getRNDPropVal("drinks") : null;

		return $r;
	}

	// Joga um cara ou coroa e retorna uma cor apenas se retorno for verdadeiro.
	public function getColour() {
		$r = $this->isPHPFeelingLikeIt() ? $this->getRNDPropVal("colours") : null;

		return $r;
	}

	// Joga um cara ou coroa e retorna um tipo de carro apenas se retorno for verdadeiro.
	public function getCar() {
		$r = $this->isPHPFeelingLikeIt() ? $this->getRNDPropVal("cars") : null;

		return $r;
	}

	// Joga um cara ou coroa e retorna um tipo de campo apenas se retorno for verdadeiro.
	public function getfieldType() {
		$r = $this->getRNDPropVal("fieldTypes");

		return $r;
	}
}
