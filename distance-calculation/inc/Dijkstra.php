<?php
class Dijkstra {
    protected $route;

    public function __construct( $route ) {
        $this->route = $route;
    }

    public function shortest_path( $source, $target ) {
        echo "Shortest route frm {$source} to {$target}: ";

        // to hold best estimates of shortest path nodes
        $paths = [];

        // to hold predecessors for each nodes
        $previous_paths = [];

        // to queue the non-optimized nodes
        $queue = new SplPriorityQueue();

        foreach ( $this->route as $v => $adj ) {
            // set initial distance to "infinity"
            $paths[$v] = INF;

            // no previous path yet
            $previous_paths[$v] = null;

            foreach ( $adj as $w => $distance ) {
                // use the shortest distance
                $queue->insert( $w, $distance );
            }
        }

        // initial distance at source is 0
        $paths[$source] = 0;

        while ( ! $queue->isEmpty() ) {
            // extract min distance
            $u = $queue->extract();

            if ( ! empty( $this->route[$u] ) ) {
                // "relax" each adjacent vertext

                foreach ( $this->route[$u] as $v => $distance ) {
                    // alternate route length to adjacent nodes
                    $alt = $paths[$u] + $distance;

                    // if alternate route is shorter
                    if ( $alt < $paths[$v] ) {
                        // update minimum length to nodes
                        $paths[$v] = $alt;
                        // add nodes to previous path
                        $previous_paths[$v] = $u;
                    }
                }
            }
        }

        // get shortest path using reverse iteration
        // shortest path with a stack
        $stack = new SplStack();
        $via   = $target;
        $dist  = 0;

        // traverse from target to source
        while ( isset( $previous_paths[$via] ) && $previous_paths[$via] ) {
            $stack->push( $via );

            // add distance to predecessor
            $dist += $this->route[$via][$previous_paths[$via]];
            $via = $previous_paths[$via];
        }

        // stack will be empty if there is no route back
        if ( $stack->isEmpty() ) {
            echo "NO route from {$source} to {$target}";
        } else {
            // add and print the path in reverse
            $stack->push( $source );
            $sep = '';

            foreach ( $stack as $v ) {
                echo $sep, $v;
                $sep = '->';
            }

            echo " ($dist KM)<br>";
        }

    }
}
