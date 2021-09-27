<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class MyArray
{
    /*
     * @var ArrayCollection $arrayCollection
     */
    protected $arrayCollection;

    /*
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->arrayCollection = new ArrayCollection($array);
    }

    /*
     * @return ArrayCollection
     */
    public function instance(): ArrayCollection
    {
        return $this->arrayCollection;
    }

    /*
     * Will sort the array collection.
     * @return ArrayCollection
     */
    public function sort(): ArrayCollection
    {
        $iterator = $this->arrayCollection->getIterator();
        $iterator->uasort(function ($a, $b) {
            return ($a < $b) ? -1 : 1;
        });
        $sorted = (new MyArray(iterator_to_array($iterator)))->instance();

        return $sorted;
    }

    /*
     * Will intersect two ArrayCollections
     * @param ArrayCollection $comparisionArray
     * @return ArrayCollection $sortedIntersect
     */
    public function intersect(ArrayCollection $comparisionArray): MyArray
    {
        $intersect = $this->arrayCollection->filter(function($element) use ($comparisionArray) {
            return $comparisionArray->contains($element) ? $element : null;
        });

        $iterator = $intersect->getIterator();
        $iterator->uasort(function ($a, $b) {
            return ($a < $b) ? -1 : 1;
        });
        $sortedIntersect = (new MyArray(iterator_to_array($iterator)));

        return $sortedIntersect;
    }
}
