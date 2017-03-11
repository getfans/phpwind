<?php

namespace Medz\Wind;

use Illuminate\Container\Container as BaseContainer;
use Psr\Container\ContainerInterface;
use RuntimeException;

class Container extends BaseContainer implements ContainerInterface
{
    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id
     *
     * @throws \RuntimeException No entry was found for this identifier.
     *
     * @return mixed
     *
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            throw new RuntimeException(sprintf('Identifier "%s" is not defined.', $id));
        }

        return $this->offsetGet($id);
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     *
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }
}
