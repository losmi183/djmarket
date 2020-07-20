<?php

function presentPrice($price) {
    return '€ '.($price / 100);
}

function setActiveClass ($category, $class = 'active') {
    return $category == request()->category ? $class : '';
}