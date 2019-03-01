<?php
namespace saintxak\filters;

class LinkFilter extends RegexFilter{
    public $searchParam = '/\<a.*?href="(.*?)"/';
}