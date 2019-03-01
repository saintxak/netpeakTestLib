<?php
namespace saintxak\filters;

class ImageFilter extends RegexFilter{
    public $searchParam = '/\<img.*?src="(.*?)"/';
}