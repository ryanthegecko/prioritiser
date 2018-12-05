
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function(){
    $(document).on("click", ".edit-goal .close", function(){
        window.location.replace('/goals');
    });


    var vWidth = $(window).innerWidth();
    var vHeight =  $(window).innerHeight();

    function getWidthsByCount(count, width=vWidth){
      return width/count;
    };

    d3.json("/goalsapi").then(function(data){
        console.log(data);
        var group = d3.select("#vis")
        .attr('width', vWidth)
        .attr('height', vHeight)
        .selectAll("g")
        .data(data);

        var widthByCount = getWidthsByCount(data.length);

        group.enter().append("g")
        .append("circle")
        .attr("cx", function(d, i){ return (widthByCount * i) + (widthByCount /2) })
        .attr("cy", 200)
        .attr("r", getWidthsByCount(data.length)/2 )
        .attr("fill", "#fff")
        .attr("stroke", "#000");

        d3.selectAll('g')
        .append('text')
        //.attr("text-anchor","middle")
        .attr("x", function(d, i){ return (widthByCount * i) +10 })
        .attr("y", 200 )
        //.width()
        .style("fill", "red")
        .text(function(d, i) { return d.title; })

    });
})
