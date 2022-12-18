<?php
require "Graph.php";

function PrintResult($result, $e)
{
    echo "the minimum spanning tree (MST)"."<BR>";
    echo "Edge        ==  cost"."<br>";
    $costOfMST=0;
    for ($i = 0; $i < $e; ++$i) {

        echo $result[$i]->Source . " -- " . $result[$i]->Destination . " == " . $result[$i]->Weight . "<br/>";
        $costOfMST=$costOfMST+$result[$i]->Weight;
    }

    echo "Cost Of MST = ".$costOfMST;
}

function Kruskal($graph)
{
    $verticesCount = $graph->VerticesCount;
    $result = array();
    $i = 0;
    $e = 0;

    usort($graph->_edge, "CompareEdges");

    $subsets = array();

    for ($v = 0; $v < $verticesCount; ++$v)
    {
        $subsets[$v] = new Subset();
        $subsets[$v]->Parent = $v;
        $subsets[$v]->Rank = 0;
    }

    while ($e < $verticesCount - 1)
    {
        $nextEdge = $graph->_edge[$i++];
        $x = Find($subsets, $nextEdge->Source);
        $y = Find($subsets, $nextEdge->Destination);

        if ($x != $y)
        {
            $result[$e++] = $nextEdge;
            Union($subsets, $x, $y);
        }
    }

    PrintResult($result, $e);
}
$verticesCount = 4;
$edgesCount = 5;
$graph = CreateGraph($verticesCount, $edgesCount);

// Edge 0-1
$graph->_edge[0]->Source = 0;
$graph->_edge[0]->Destination = 1;
$graph->_edge[0]->Weight = 10;

// Edge 0-2
$graph->_edge[1]->Source = 0;
$graph->_edge[1]->Destination = 2;
$graph->_edge[1]->Weight = 6;

// Edge 0-3
$graph->_edge[2]->Source = 0;
$graph->_edge[2]->Destination = 3;
$graph->_edge[2]->Weight = 5;

// Edge 1-3
$graph->_edge[3]->Source = 1;
$graph->_edge[3]->Destination = 3;
$graph->_edge[3]->Weight = 15;

// Edge 2-3
$graph->_edge[4]->Source = 2;
$graph->_edge[4]->Destination = 3;
$graph->_edge[4]->Weight = 4;
Kruskal($graph);
