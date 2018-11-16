<?php

class Stack 
{
    private $stack;

    function __construct()
    {
        $this->stack = array();
    }

    public function push($e = '')
    {
        if (!empty($e)) {
            array_push($this->stack, $e);
        }
    }

    public function pop()
    {
        $isEmpty = $this->isEmpty();
        if (!$isEmpty) {
            unset($this->stack[count($this->stack) - 1]);
        }
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }

    public function getCount()
    {
        return count($this->stack);
    }

    public function peek()
    {
        $isEmpty = $this->isEmpty();
        if (!$isEmpty) {
            return $this->stack[count($this->stack) - 1];
        } else {
            return null;
        }
    }
}


/**
 * 测试括号是否正确匹配
 * @var string
 */
$str = '{[()]}';
// $str = '[()]}';
$stack = new Stack();
for ($i=0; $i < strlen($str); $i++) { 
    $char = substr($str, $i, 1);
    if ('{' == $char || '[' == $char || '(' == $char) {
        $stack->push($char);
    } else {
        if (')' == $char && '(' == $stack->peek()) {
            $stack->pop();
        } else if (']' == $char && '[' == $stack->peek()) {
            $stack->pop();
        } else if ('}' == $char && '{' == $stack->peek()) {
            $stack->pop();
        }else {
            exit('false');
        }
    }
}

$stack->isEmpty() ? exit('true') : exit('false');