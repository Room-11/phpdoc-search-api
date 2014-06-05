<?php

namespace PHPDocSearch\Symbols;

class ClassMethod extends ClassMember
{
    /**
     * Get the JSON representation of this object
     *
     * @return \stdClass
     */
    public function jsonSerialize()
    {
        return (object) [
            'name' => $this->name,
            'class' => $this->memberClass->getName(),
            'defined_in' => $this->ownerClass->getName(),
            'link' => 'http://php.net/' . $this->slug,
        ];
    }
}
