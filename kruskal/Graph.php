<?php
class Edge
{
    public $Source;
    public $Destination;
    public $Weight;
}

class Graph
{
    public $VerticesCount;
    public $EdgesCount;
    public $_edge = array();

}
class Subset
{
    public $Parent;
    public $Rank;
}

function CreateGraph($verticesCount, $edgesCoun)
{
    $graph = new Graph();
    $graph->VerticesCount = $verticesCount;
    $graph->EdgesCount = $edgesCoun;
    $graph->_edge = array();

    for ($i = 0; $i < $graph->EdgesCount; ++$i)
        $graph->_edge[$i] = new Edge();

    return $graph;
}

function Find($subsets, $i)
{
    if ($subsets[$i]->Parent != $i)
        $subsets[$i]->Parent = Find($subsets, $subsets[$i]->Parent);

    return $subsets[$i]->Parent;
}

function Union($subsets, $x, $y)
{
    $xroot = Find($subsets, $x);
    $yroot = Find($subsets, $y);

    if ($subsets[$xroot]->Rank < $subsets[$yroot]->Rank)
        $subsets[$xroot]->Parent = $yroot;
    else if ($subsets[$xroot]->Rank > $subsets[$yroot]->Rank)
        $subsets[$yroot]->Parent = $xroot;
    else
    {
        $subsets[$yroot]->Parent = $xroot;
        ++$subsets[$xroot]->Rank;
    }
}

function CompareEdges($a, $b)
{
    return $a->Weight > $b->Weight;
}


