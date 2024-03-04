<?php

namespace App\Models\Helpers;

class Graph {
        private $vertices;
        private $edges;

        public function __construct() {
            $this->vertices = [];
            $this->edges = [];
        }

        public function addVertex($vertex) {
            $this->vertices[] = $vertex;
            $this->edges[$vertex] = [];
        }

        public function addEdge($source, $destination, $weight) {
            $this->edges[$source][$destination] = $weight;
        }

        public function editEdge($source, $destination, $newWeight) {
            if (isset($this->edges[$source][$destination])) {
                $this->edges[$source][$destination] = $newWeight;
            }
        }

        public function getWeight($source, $destination) {
            return $this->edges[$source][$destination];
        }


    public function traverseGraph($vertices, $depth) {
        $result = [];
        $maxTraverse = null;
        $maxValue = PHP_INT_MIN;

        foreach ($vertices as $vertex) {
            $visited = [];
            $cost = 0; // Initialize the cost for each traverse
            $this->traverseHelper($vertex, $depth, $visited, $result, $cost);

            // Divide the cost by the depth
            $traverseValue = $cost / $depth;

            if ($traverseValue > $maxValue) {
                $maxValue = $traverseValue;
                $maxTraverse = $result;
            }
        }

        if (!empty($maxTraverse)) {
            $lastVertex = end($maxTraverse)['vertex'];
            return $lastVertex;
        }
    }

    private function traverseHelper($vertex, $depth, &$visited, &$result, &$cost, $currentDepth = 0) {
        if ($currentDepth > $depth) {
            return;
        }

        array_push($visited, $vertex);
        $result[] = [
            'vertex' => $vertex,
            'cost' => $cost // Save the cost for each vertex in the result
        ];

        $maxWeight = PHP_INT_MIN;
        $nextVertex = null;

        foreach ($this->edges[$vertex] as $destination => $weight) {
            if ($weight > $maxWeight && !in_array($destination, $visited)) {
                $maxWeight = $weight;
                $nextVertex = $destination;
            }
        }

        if ($nextVertex !== null) {
            $cost = $maxWeight; // Update the cost for the next vertex
            $this->traverseHelper($nextVertex, $depth, $visited, $result, $cost, $currentDepth + 1);
            $cost -= $maxWeight; // Reset the cost after backtracking
        }

        $visited[$vertex] = false;
    }

    // public function highest_depth(Graph $graph) {
    //     $visited = [];
    //     $max_depth = 0;

    //     foreach ($graph->vertices as $vertex) {
    //         if (!in_array($vertex, $visited)) {
    //             $max_depth = max($max_depth, $this->dfs($graph, $vertex, array_merge([], $visited), 0));
    //             var_dump($max_depth);
    //         }
    //     }

    //     return $max_depth;
    // }

    // private function dfs(Graph $graph, $vertex, array $visited, int $depth) {
    //     $visited[] = $vertex;
    //     $depth++;

    //     foreach (array_keys($graph->edges[$vertex]) as $neighbor) {
    //         if (!in_array($neighbor, $visited)) {
    //             $depth = max($depth, $this->dfs($graph, $neighbor, $visited, $depth));
    //             var_dump($depth);
    //         }
    //     }

    //     return $depth;
    // }

    public function longestPath() {
        $maxPathLength = 0;

        foreach ($this->vertices as $vertex) {
            $visited = [];
            $pathLength = $this->dfsLongestPath($vertex, $visited);
            if ($pathLength > $maxPathLength) {
                $maxPathLength = $pathLength;
            }
        }

        return $maxPathLength;
    }

    private function dfsLongestPath($vertex, &$visited, $length = 0) {
        if (isset($visited[$vertex])) {
            return $length; // Path already visited, return current length
        }

        $visited[$vertex] = true;
        $maxPathLength = $length;

        foreach ($this->edges[$vertex] as $neighbor => $weight) {
            $pathLength = $this->dfsLongestPath($neighbor, $visited, $length + 1);
            if ($pathLength > $maxPathLength) {
                $maxPathLength = $pathLength;
            }
        }

        unset($visited[$vertex]); // Backtrack

        return $maxPathLength;
    }

}

