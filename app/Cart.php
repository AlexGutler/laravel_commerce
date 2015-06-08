<?php
namespace CodeCommerce;


class Cart
{

    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        // id -> qtd, price, name
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name
            ]
        ];
        return $this->items;
    }

    /**
     * @param $id
     * @return array
     */
    public function remove($id)
    {
        if ($this->items[$id]['qtd'] == 1) {
            unset($this->items[$id]);
        } else {
            $this->items += [
                $id => [
                    'qtd' => $this->items[$id]['qtd']--,
                ]
            ];
        }

        return $this->items;
    }

    public function destroy($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $item)
        {
            $total += $item['qtd'] * $item['price'];
        }
        return $total;
    }

    public function clear()
    {
        $this->items = [];
    }

    public function getQtd($id)
    {
        return $this->items[$id]['qtd'];
    }
}