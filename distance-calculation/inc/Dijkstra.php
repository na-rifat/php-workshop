<?php
class Dijkstra
{
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function shortest_path($source, $target)
    {
        echo "Shortest route frm {$source} to {$target}: ";

        $paths = [];

        $previous_paths = [];

        $queue = new SplPriorityQueue();

        foreach ($this->routes as $v => $adj) {
            $paths[$v] = INF;

            $previous_paths[$v] = null;

            foreach ($adj as $w => $distance) {
                $queue->insert($w, $distance);
            }
        }
    }
}
