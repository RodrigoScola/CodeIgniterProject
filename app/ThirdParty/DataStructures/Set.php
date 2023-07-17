<?php

namespace App\ThirdParty\DataStructures;


class Set
{
     private array $items = [];

     public function __construct(array $items = [])
     {
          if (!empty($items)) {
               foreach ($items as $item) {
                    if (!$this->has($item)) {
                         $this->add($item);
                    }
               }
          }
     }
     public function has($item): bool
     {
          return array_key_exists($item, $this->items);
     }
     public function remove($item)
     {

          if ($this->has(($item))) {
               unset($this->items[$item]);
          }

     }
     public function getItems()
     {
          $keys = [];

          foreach ($this->items as $key => $value) {
               array_push($keys, $key);
          }
          return $keys;
     }

     public function __toString()
     {
          $items = "";
          foreach ($this->items as $key => $value) {
               $items += ' ' . $key;
          }
          return $items;
     }
     public function add($item)
     {
          if (!$this->has($item)) {
               $this->items[$item] = true;
          }
     }
}