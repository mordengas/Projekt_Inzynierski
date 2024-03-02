{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graph Visualization with D3.js</title>
  <script src="https://d3js.org/d3.v7.min.js"></script>
  <style>
    /* Add your CSS styling here */
    .arrow {
      fill: #999;
    }
    .edge-text {
      font-size: 12px;
      fill: #333;
      pointer-events: none;
    }
    .node text {
      font-size: 14px;
      text-anchor: middle;
    }
  </style>
</head>
<body>
  <svg width="1200" height="800"></svg>
  <script>
    const genres = {!! json_encode($genres) !!};
    const graphEdges = {!! json_encode($edges->toArray()) !!};

    const nodes = genres.map(genre => ({ id: genre }));
    const links = graphEdges.map(edge => ({ source: edge.start, target: edge.destination, weight: edge.weight }));

    // Initialize the D3 force simulation
    const simulation = d3.forceSimulation(nodes)
        .force("link", d3.forceLink(links).id(d => d.id).distance(200)) // Adjust distance for spreading out
        .force("charge", d3.forceManyBody().strength(-400)) // Increase charge to repel nodes more
        .force("center", d3.forceCenter(600, 400));

    // Create SVG element
    const svg = d3.select("svg")
        .call(d3.zoom().on("zoom", zoomed))
        .append("g");

    const container = svg.append("g");

    // Create links
    const link = container.selectAll("line")
        .data(links)
        .enter().append("line")
        .attr("stroke", "#999")
        .attr("stroke-opacity", 0.6)
        .attr("stroke-width", 2)
        .attr("marker-end", "url(#arrow)");

    // Create arrow marker
    svg.append("defs").append("marker")
        .attr("id", "arrow")
        .attr("viewBox", "0 -5 10 10")
        .attr("refX", 22)
        .attr("refY", 0)
        .attr("markerWidth", 8)
        .attr("markerHeight", 8)
        .attr("orient", "auto")
        .append("path")
        .attr("class", "arrow")
        .attr("d", "M0,-5L10,0L0,5");

    // Create nodes
    const node = container.selectAll("g.node")
        .data(nodes)
        .enter().append("g")
        .attr("class", "node")
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended));

    // Append circles to nodes
    node.append("circle")
        .attr("r", 20) // Increase circle radius for bigger nodes
        .attr("fill", "steelblue");

    // Append labels to nodes
    node.append("text")
        .attr("dy", "0.35em")
        .text(function(d) { return d.id; });

    // Add edge weight labels
    const edgeText = container.selectAll(".edge-text")
        .data(links)
        .enter().append("text")
        .attr("class", "edge-text")
        .attr("dx", "0.35em")
        .attr("dy", "-0.35em")
        .text(function(d) { return d.weight; });

    // Add forces to the simulation
    simulation.on("tick", ticked);

    // Function to update node and link positions
    function ticked() {
      link
          .attr("x1", function(d) { return d.source.x; })
          .attr("y1", function(d) { return d.source.y; })
          .attr("x2", function(d) { return d.target.x; })
          .attr("y2", function(d) { return d.target.y; });

      node.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });

      edgeText
          .attr("x", function(d) { return (d.source.x + d.target.x) / 2; })
          .attr("y", function(d) { return (d.source.y + d.target.y) / 2; });
    }

    // Functions for drag behavior
    function dragstarted(event, d) {
      if (!event.active) simulation.alphaTarget(0.3).restart();
      d.fx = d.x;
      d.fy = d.y;
    }

    function dragged(event, d) {
      d.fx = event.x;
      d.fy = event.y;
    }

    function dragended(event, d) {
      if (!event.active) simulation.alphaTarget(0);
      d.fx = null;
      d.fy = null;
    }

    // Function for zoom behavior
    function zoomed(event) {
      container.attr("transform", event.transform);
    }
  </script>
</body>
</html> --}}
@extends('admin.graphWeights.index')

@section('graph')

    {{-- <style>
    /* Add your CSS styling here */
    .arrow {
      fill: #999;
    }
    .edge-text {
      font-size: 12px;
      fill: #333;
      pointer-events: none;
    }
    .node text {
      font-size: 14px;
      text-anchor: middle;
    }
  </style> --}}

<div class="container">
  <svg id="graph-svg" width="800" height="800"></svg> <!-- Assigned ID to the SVG -->
  <script>
    const genres = {!! json_encode($genres) !!};
    const graphEdges = {!! json_encode($edges->toArray()) !!};

    const nodes = genres.map(genre => ({ id: genre }));
    const links = graphEdges.map(edge => ({ source: edge.start, target: edge.destination, weight: edge.weight }));

    // Initialize the D3 force simulation
    const simulation = d3.forceSimulation(nodes)
        .force("link", d3.forceLink(links).id(d => d.id).distance(200)) // Adjust distance for spreading out
        .force("charge", d3.forceManyBody().strength(-400)) // Increase charge to repel nodes more
        .force("center", d3.forceCenter(600, 400));

    // Create SVG element
    const svg = d3.select("#graph-svg") // Selecting SVG by ID
        .call(d3.zoom().on("zoom", zoomed))
        .append("g");

    const container = svg.append("g");

    // Create links
    const link = container.selectAll("line")
        .data(links)
        .enter().append("line")
        .attr("stroke", "#999")
        .attr("stroke-opacity", 0.6)
        .attr("stroke-width", 2)
        .attr("marker-end", "url(#arrow)");

    // Create arrow marker
    svg.append("defs").append("marker")
        .attr("id", "arrow")
        .attr("viewBox", "0 -5 10 10")
        .attr("refX", 22)
        .attr("refY", 0)
        .attr("markerWidth", 8)
        .attr("markerHeight", 8)
        .attr("orient", "auto")
        .append("path")
        .attr("class", "arrow")
        .attr("d", "M0,-5L10,0L0,5");

    // Create nodes
    const node = container.selectAll("g.node")
        .data(nodes)
        .enter().append("g")
        .attr("class", "node")
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended));

    // Append circles to nodes
    node.append("circle")
        .attr("r", 20) // Increase circle radius for bigger nodes
        .attr("fill", "steelblue");

    // Append labels to nodes
    node.append("text")
        .attr("dy", "0.35em")
        .text(function(d) { return d.id; });

    // Add edge weight labels
    const edgeText = container.selectAll(".edge-text")
        .data(links)
        .enter().append("text")
        .attr("class", "edge-text")
        .attr("dx", "0.35em")
        .attr("dy", "-0.35em")
        .text(function(d) { return d.weight; });

    // Add forces to the simulation
    simulation.on("tick", ticked);

    // Function to update node and link positions
    function ticked() {
      link
          .attr("x1", function(d) { return d.source.x; })
          .attr("y1", function(d) { return d.source.y; })
          .attr("x2", function(d) { return d.target.x; })
          .attr("y2", function(d) { return d.target.y; });

      node.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });

      edgeText
          .attr("x", function(d) { return (d.source.x + d.target.x) / 2; })
          .attr("y", function(d) { return (d.source.y + d.target.y) / 2; });
    }

    // Functions for drag behavior
    function dragstarted(event, d) {
      if (!event.active) simulation.alphaTarget(0.3).restart();
      d.fx = d.x;
      d.fy = d.y;
    }

    function dragged(event, d) {
      d.fx = event.x;
      d.fy = event.y;
    }

    function dragended(event, d) {
      if (!event.active) simulation.alphaTarget(0);
      d.fx = null;
      d.fy = null;
    }

    // Function for zoom behavior
    function zoomed(event) {
      container.attr("transform", event.transform);
    }
  </script>
</div>
{{-- <script src="https://d3js.org/d3.v7.min.js"></script> --}}


@endsection
