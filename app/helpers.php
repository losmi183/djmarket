<?php

function presentPrice($price) {
    return '€ '.($price / 100);
}

function setActiveClass ($category, $class = 'active') {
    return $category == request()->category ? $class : '';
}

function presentInEuros($price) {
    return $price / 100;
}


// Auth Helpers
function isPublisher() 
{
    if(auth()->user()) 
    {
        if( auth()->user()->role == 'publisher' OR auth()->user()->role == 'admin' ) 
        {
            return true;
        }
        else 
        {
            return false;
        }        
    } 
    else {
        return false;
    }
}
function isAdmin() 
{
    if(auth()->user()) 
    {
        if( auth()->user()->role == 'admin' ) 
        {
            return true;
        }
        else 
        {
            return false;
        }            
    } 
    else {
        return false;
    }
}
function isCustomer() 
{
    if(auth()->user()) 
    {
        if( auth()->user()->role == 'customer' ) 
        {
            return true;
        }
        else 
        {
            return false;
        }            
    } 
    else {
        return false;
    }
}