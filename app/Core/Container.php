<?php

// namespace Core;

// use ReflectionClass;

// class Container
// {
//     public function resolve(string $class)
//     {
//         $reflector = new ReflectionClass($class);

//         // If no constructor, just create the object
//         if (!$reflector->getConstructor()) {
//             return new $class;
//         }

//         // Get constructor parameters
//         $params = $reflector->getConstructor()->getParameters();
//         $dependencies = [];

//         foreach ($params as $param) {
//             $dependencyClass = $param->getType()?->getName();

//             if ($dependencyClass) {
//                 $dependencies[] = $this->resolve($dependencyClass);
//             }
//         }

//         return $reflector->newInstanceArgs($dependencies);
//     }
// }




namespace Core;

class Container
{
    protected array $bindings = [];
    protected array $instances = [];

    public function bind(string $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key)
    {
        if (isset($this->bindings[$key])) {
            return call_user_func($this->bindings[$key]);
        }

        // fallback to auto-resolving classes with constructor injection
        return new $key;
    }
}
