
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function(){

          var vWidth = $(".container").innerWidth();
          var vHeight =  $(window).innerHeight() * 0.85;
      function getWidthsByCount(count, width=vWidth){
        return width/count;
      };


    $(document).on("click", ".edit-goal .close", function(){
        window.location.replace('/goals');
    });

    $(document).on("click", ".card-title", function(){
        if ( $(this).is('.steps') ){
          //alert();
          $('.tab-steps').fadeIn();
          $('.tab-consequences').hide();
        } else {
          $('.tab-consequences').fadeIn();
          $('.tab-steps').hide();
        }
    });

    $(document).on("click", "circle", function(){
      var id = $(this).attr('id');
      //var url = "/stepapi/"+id;
      window.location.replace("/goal/"+id+"/edit");

      //console.log(url);
      // d3.json(url).then(function(data){
      //   console.log(data);
      //   var widthByCount = getWidthsByCount(data.length);
      //
      //   d3.select("circle[data-goalid='goal"+id+"']")

          // Apply the general update pattern to the nodes.
        // var node = data.data(data, function(d) { return d.id;});
        // node.exit().remove();
        // node = node.enter().append("circle").attr("fill", function(d) { return color(d.id); }).attr("r", 8).merge(node);
        // //.attr("fill", "#131")

        //$("circle[data-goalid='goal"+id+"']").attr('fill', '#131');
        //
        //d3.selectAll('g')
        // .append('text')
        // .attr('class', 'wrap-me')
        // .attr("x", function(d, i){ return (widthByCount * i) +10 })
        // .attr("y", 200 )
        // .style("fill","red")
        // .style("font-size","10px")
        // .text(function(d, i) { return d.title; })


      //})
    })

    d3.json("/goalsapi").then(function(data){
        //console.log(data);
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
        .attr("r",  function(d, i){ return (d.value + 1) * 10 })
        .attr("id", function(d, i){ return d.id })
        .attr("data-goalid", function(d, i){ return 'goal'+d.id })
        .attr("fill", "#fff")
        .attr("stroke", "#000");

        d3.selectAll('g')
        .append('text')
        .attr('class', 'wrap-me')
        .attr("x", function(d, i){ return (widthByCount * i) +10 })
        .attr("y", 200 )
        .style("fill","red")
        .style("font-size","10px")
        .text(function(d, i) { return d.title + ' '+d.value; })

        new d3plus.TextBox()
          .select('g')
          .data(data)
          .fontSize(16)
          .width(200)
          .x(function(d, i) { return i * 250; })
          .render();

        var simulation = d3.forceSimulation(data)
          .force('charge', d3.forceManyBody())
          .force('center', d3.forceCenter(vWidth / 2, vHeight / 2))
          // .force('center', function(d) {
          //   console.log( d.value );
          //   return d.value
          // })

          .force('collision', d3.forceCollide().radius(function(d) {
            return (d.value + 1) * 10
          }))
          .on('tick', ticked);

        function ticked() {
          var u = d3.select('svg')
            .selectAll('circle')
            .data(data)

          u.enter()
            .append('circle')
            .attr('r', function(d) {
              return (d.value + 1) * 30
            })
            .merge(u)
            .attr('cx', function(d) {
              //console.log(d)
              return d.x
            })
            .attr('cy', function(d) {
              return d.y
              //- (d.value * 25)
            })

          u.exit().remove()

          var v = d3.select('svg')
            .selectAll('text')
            .data(data)

          v.enter()
            //.append('text')
            // .append(function(d,i) {
            //     var text = new d3plus.TextBox()
            //       .fontSize(16)
            //       .width(50)
            //       .text(function(d) {
            //         return d;
            //       })
            //       .x(function(d, i) { return i * 250; })
            //       .render();
            //       return document.createElement('text');
            // })

            .attr('r', 5)
            .merge(v)
            .attr('x', function(d) {
              return d.x -30
            })
            .attr('y', function(d) {
              return d.y
              //- (d.value * 25)
            })

          u.exit().remove()
        }
    });



})
