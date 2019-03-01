<?php
namespace saintxak\commands;

interface ICommand{
	public function getName();
	public function run(array $args);
}