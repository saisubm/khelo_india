@include('includes.header')
<style>
    html,
    body,

    #viewDiv {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        font-family: 'Lato', sans-serif;
        /* border: 0px !important; */
    }
    .esri-view-height-less-than-medium .esri-popup__main-container {
    max-height: 600px !important;
}

    .table-striped>tbody>tr:nth-child(odd)>td,
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #ff8100; // Choose your own color here
 }
</style>
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://js.arcgis.com/4.25/esri/themes/light/main.css">
<div class="state-wise-count py-5 khelo-india-summary landing-tiles">
    <div class="container">

        <div class="row align-items-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3">
                <button type="button" onclick="{history.back()}" class="background-light border-0" style="background-color: transparent !important">
                    <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                        alt="" />
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
              <h2 class="text-center" style="font-size: 33px; font-weight:700; ">Sports for Women - Women Leagues</h2>
            </div>
          </div>


        <div id="khelo-india-centers"
            style="background-color: white !important; border:0px !important; padding:0px 0px;">
            <div class="container">
                <div class="row justify-content-center">

                </div>

                <div class="row align-items-center">
                    <div class="col-md-3 col-12  ">
                        <div class="py-4">
                            <figure class="highcharts-figure">
                              <a href="{{url('sports-for-women-discipline-wise')}}"><div id="container-4"></div></a>
                          </figure>
                          </div>
                    </div>

                   <div class="col-md-9 col-12">


                    <div class="row py-5">

                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="{{url('sports-for-women-discipline-wise-prize-money')}}" class="text-decoration-none">
                                <div class="khelo-summary summary-tile-1">
                                    <div class="row justify-content-between align-items-center mb-2">
                                        <div class="col-auto">
                                            <div class="summary-number summary-number-1">
                                                <h3>{{(number_format((float)$m_cards->sanctioned_prize_money/10000000, 2, '.', '')) ?? ''}}</h3>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="m-0">Prize Money (In Cr.)</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                           <a href="{{url('women-national-records')}}" class="text-decoration-none">
                            <div class="khelo-summary summary-tile-2">
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-auto">
                                        <div class="summary-number summary-number-2">
                                            <h3>05</h3>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="{{asset('public/front/assets/images/svg/s-img-2.svg')}}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <p class="m-0">National Records</p>
                                </div>
                            </div>
                           </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="{{url('sports-for-women-discipline-wise-technical-official')}}" class="text-decoration-none">
                            <div class="khelo-summary summary-tile-3">
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-auto">
                                        <div class="summary-number summary-number-3">
                                            <h3>{{$cards->no_of_technical_officials ?? ''}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="{{asset('public/front/assets/images/svg/s-img-3.svg')}}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <p class="m-0">Technical Officials</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="{{url('sports-for-women-discipline-wise-beneficiaries')}}" class="text-decoration-none">
                            <div class="khelo-summary summary-tile-4">
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-auto">
                                        <div class="summary-number summary-number-4">
                                            <h3>{{$m_cards->no_of_beneficiaries ?? ''}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="{{asset('public/front/assets/images/svg/s-img-2.svg')}}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <p class="m-0">No. of Beneficiaries</p>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="{{url('sports-for-women-discipline-wise-identified-talents')}}" class="text-decoration-none">
                            <div class="khelo-summary summary-tile-5">
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-auto">
                                        <div class="summary-number summary-number-5">
                                            <h3>{{$cards->no_identified_talents ?? ''}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <p class="m-0">Identified Talents</p>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="{{url('sports-for-women-discipline-wise-athletes')}}" class="text-decoration-none">
                            <div class="khelo-summary summary-tile-6">
                                <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-auto">
                                        <div class="summary-number summary-number-6">
                                            <h3>{{$cards->no_of_athletes ?? ''}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                                    </div>
                                </div>
                                <div>
                                    <p class="m-0">Participation</p>
                                </div>
                            </div>
                        </a>
                        </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="row">


            </div>
            <div class="col-md-12 col-12">
                <div class="row">
                  <div style="border:1px solid grey; ">
                    <h4 class="text-center border-bottom my-2 pb-2">State-Wise Distribution of Women Leagues</h4>
                      <div id="viewDiv" title="Click on the State/UT to know the details of Women Leagues" style="min-height: 100vh !important; padding:2px 0px; ">

                </div>

                </div>

                  </div>
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var d_max = "{{$m_cards->events_planned}}"*1;
    var event_count = "{{$cards->event_count}}"*1;
    Highcharts.chart('container-4', {
colors:['#290cbe','#f37022','#2cccde','#177d88'],
  chart: {
      type: 'pie'
  },
  title: {
      text: 'Status of Disciplines',
      align: 'center'
  },
  subtitle: {
      text: '',
      align: ''
  },

  accessibility: {
      announceNewData: {
          enabled: true
      },
      point: {
          valueSuffix: '%'
      }
  },

  plotOptions: {
      series: {
          dataLabels: {
              enabled: false,
              format: '{point.name}: {point.y}'
          }
      },
      pie:{
        showInLegend: true
      }
  },

  tooltip: {
      headerFormat: '',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
  },
  exporting: {
      enabled: false
  },

  series: [
      {
        innerSize: '50%',
          name: '',
          colorByPoint: true,
          data: [{name:"Disciplines Started",y:12},{name:"Disciplines Pending",y:2}]
      }
  ],
});
//     Highcharts.chart('women-meter-1', {

// chart: {
//   type: 'gauge',
//   plotBackgroundColor: null,
//   plotBackgroundImage: null,
//   plotBorderWidth: 0,
//   plotShadow: false,
//   height: '80%'
// },

// title: {
//   text: 'LEAGUES AT A GLANCE'
// },

// pane: {
//   startAngle: -90,
//   endAngle: 89.9,
//   background: null,
//   center: ['50%', '75%'],
//   size: '110%'
// },

// // the value axis
// yAxis: {
//   min: 0,
//   max: d_max,
//   tickPixelInterval: 72,
//   tickPosition: 'inside',
//   tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
//   tickLength: 20,
//   tickWidth: 2,
//   minorTickInterval: null,
//   labels: {
//       distance: 20,
//       style: {
//           fontSize: '14px'
//       }
//   },
//   plotBands: [{
//       from: 0,
//       to: 100,
//       color: '#DF5353', // green
//       thickness: 20
//   }, {
//       from: 100,
//       to: 180,
//       color: '#DDDF0D', // yellow
//       thickness: 20
//   }, {
//       from: 180,
//       to: d_max,
//       color: '#55BF3B', // red
//       thickness: 20
//   }]
// },
//   exporting: {
//       enabled: false
//   },

// series: [{
//   name: 'Events Organized',
//   data:[event_count],
//   tooltip: {
//       valueSuffix: ' out of '+d_max +' Planned Events'
//   },
//   dataLabels: {
//       format: '{y} ',
//       borderWidth: 0,
//       color: (
//           Highcharts.defaultOptions.title &&
//           Highcharts.defaultOptions.title.style &&
//           Highcharts.defaultOptions.title.style.color
//       ) || '#333333',
//       style: {
//           fontSize: '16px'
//       }
//   },
//   dial: {
//       radius: '80%',
//       backgroundColor: 'gray',
//       baseWidth: 12,
//       baseLength: '0%',
//       rearLength: '0%'
//   },
//   pivot: {
//       backgroundColor: 'gray',
//       radius: 6
//   }

// }]

// });


  </script>
<script src="https://js.arcgis.com/4.25/"></script>
<script src="{{asset('public/front/global.js')}}"></script>

<script>



    var data = <?php echo $map_data ?>;
    var data_dict = {};
    var map_location = [];
    for (i=0;i<data.length;i++)
    {
        map_location.push([data[i].latitude,data[i].longitude]);
      if(!(data[i].state_code in data_dict)){
        data_dict[data[i].state_code] = [];
      }
      data_dict[data[i].state_code].push(data[i])
    }

    console.log(data_dict);
    $.LoadingOverlay("show");
    require(["esri/config",
        "esri/Map",
        "esri/views/MapView",
        "esri/layers/MapImageLayer",
        "esri/layers/FeatureLayer",
        "esri/Graphic",
        "esri/layers/GraphicsLayer",
        "esri/renderers/UniqueValueRenderer",
        "esri/symbols/SimpleFillSymbol",
        "esri/symbols/SimpleLineSymbol",
    ], function(esriConfig, Map, MapView, MapImageLayer, FeatureLayer, Graphic, GraphicsLayer,
        UniqueValueRenderer, SimpleLineSymbol, SimpleFillSymbol) {

        //esriConfig.apiKey = "YOUR_API_KEY";

        const map = new Map({
            //basemap: "topo-vector" // Basemap layer service

        });


        const BoundaryLayerUrl =
            "https://mapservice.gov.in/gismapservice/rest/services/BharatMapService/Admin_Boundary_District/MapServer";
        esriConfig.request.interceptors.push({
            urls: "https://mapservice.gov.in/gismapservice/rest/services/BharatMapService/Admin_Boundary_District/MapServer",
            before: function(params) {
                params.requestOptions.query = params.requestOptions.query || {};
                params.requestOptions.query.token =
                    "_KxIuXobFOEc4mxtrv7gtY8CQ9368NPE4BSmM4HxTV92D1nrT2Coynkbh8Fu6MveooSDyY3-GYN8I0HAzHjOiM4OEyFBTFzTlFunVbnsMQo."; //Get the token from https://token.slip.wa.gov.au/arcgis/tokens/
            },
        });
        const cars = ["1", "2", "3"];
        //        const trailheadsLayer = new FeatureLayer({
        //  url: "https://services3.arcgis.com/GVgbJbqm8hXASVYi/arcgis/rest/services/Trailheads/FeatureServer/0"
        // });
        var popupTrailheads = {
            title: "KIC Details for",
            content: demo_function
        }



        var stateLayer = new FeatureLayer({
            url: BoundaryLayerUrl,
            layerId: 1,
            id: "stateLayer",
            outFields: ['*'],
            popupTemplate: popupTrailheads
            //	sublayers:[
            //	{
            //     id: 0,
            //     visible: true,
            //     popupTemplate:{
            //       title:"{STNAME} ",
            //       content: "Number of Sports Infrastructure"+cars[0]
            //     }
            //	}
            //	]
        })
        var t = [
            91,
            92,
            93,
            94,
            95,
            96,
            97,
            98,
            99,
            110,
            111,
            112,
            113,
            114,
            115,
            116,
            117,
            118,
            119,
            120,
            121,
            122,
            123,
            124,
            125,
            126,
            127,
            128,
            129,
            130,
            131,
            132,
            133,
            134,
            135,
            136,
            137,
            138,
            139,
        ];
        var newTemp = t;

        function demo_function(feature) {
            //console.log(t[feature.graphic.attributes.OBJECTID]);
            var html = '';
            if(!(feature.graphic.attributes.STCODE11 in data_dict))
            {

                html += `<tr>
     <td colspan="3" class="text-center">No League Conducted</td>
      </tr>
     `;
            }
            else
            {
for(let i = 0;i<data_dict[feature.graphic.attributes.STCODE11].length;i++){
    console.log(data_dict[feature.graphic.attributes.STCODE11][i]);
            html += `<tr class="text-center">
     <td >${i+1}</td>
     <td>${data_dict[feature.graphic.attributes.STCODE11][i]['name_of_event']}</td>
    <td>${data_dict[feature.graphic.attributes.STCODE11][i]['no_of_athletes']}</td>
      </tr>
     `;
}
}
            return `
          <div class="col-12">
            <h6 class="text-center">Women Leagues Conducted in<br/> `+feature.graphic.attributes.STNAME+`</h6>
           <div class='table-responsive'>
            <table class="table table-bordered">
 <thead >
    <tr class="text-center" >
    <th>S. No.</th>
    <th>Event Name</th>
    <th>No. of Athletes</th>
    </tr>
    </thead>
 <tbody>
   ${html}



 </tbody>
</table>
            </div>

            </div>

           `;

        }
        //view.on("click", function (event) {
        //	alert(event.x);
        //});‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍‍
        //view.on("load", addFeatureLayer);
        const labelClass = {
            // autocasts as new LabelClass()
            symbol: {
                type: "text", // autocasts as new TextSymbol()
                color: "black",
                font: { // autocast as new Font()
                    family: "Ubuntu Mono",
                    size: 9
                    //weight: "bold"
                }
            },
//             labelPlacement: "above-center",
//             labelExpressionInfo: {
//                 expression: `var temp = $feature.OBJECTID;
//   return temp`
//                 //(newTemp[0]);`
//             }
        };
        labelClass.deconflictionStrategy = "static";
        var a = ["1", "2", "3"]

        function myfunction() {
            //console.log(feature.graphic.attributes.OBJECTID);
            //console.log(feature)
            var newfeature = parseInt(feature);
            //newfeature = newfeature/10;
            //return(newfeature.toString());
            return (feature.graphic.attributes.OBJECTID);
            //return(newTemp);
        }

        let renderer = {
            type: "unique-value", // autocasts as new UniqueValueRenderer()
            field: "STCODE11",
            defaultSymbol: null,
            defaultLabel: "Himanshu",
            uniqueValueInfos:[],
            // autocasts as new SimpleFillSymbol()
            //labelingInfo: [labelClass],
        };



        for(let state_code in state_district)
        {

                renderer.uniqueValueInfos.push({
                // All features with value of "North" will be blue
                    value: state_code,
                    symbol: {
                        type: "simple-fill", // autocasts as new SimpleFillSymbol()
                        color: {r: 135, g: 206, b: 235, a: 0.1}
                    }
                });

        }
        var districtLayer = new FeatureLayer({
            url: BoundaryLayerUrl,
            layerId: 0,
            id: "stateLayer",
            outFields: ['*'],
            popupTemplate: popupTrailheads,
            autoOpenEnabled: false,
            mode: FeatureLayer.MODE_ONDEMAND,
            labelingInfo: [labelClass],
            enableLabels: false,
            //	sublayers:[
            //	{
            //     id: 0,
            //     visible: true,
            //     popupTemplate:{
            //       title:"{STNAME} ",
            //       content: "Number of Sports Infrastructure"+cars[0]
            //     }
            //	}
            //	]
        })







        districtLayer.renderer = renderer;
        districtLayer.enableLabels = false;
        // Add a unique value info for the "North" region
        // using individual function arguments
        //  .setRenderer(renderer);
        //featureLayer.redraw();
        districtLayer.refresh();
        //view.when(function() {
        //alert("Himanshu");
        var view = new MapView({
            map: map,
            center: [79.0882, 21.1458], // Longitude, latitude
            //zoom: 0, // Zoom level
            //slider:false,
            container: "viewDiv", // Div element
            highlightOptions: {
                color: "lightblue",
                haloColor: "darkorange",
                haloOpacity: "0"
            }
        });

        view.when(function() {
                map.add(districtLayer);
                // MapView is now ready for display and can be used. Here we will
                // use goTo to view a particular location at a given zoom level and center
                view.goTo({
                    //extent:districtLayer.fullExtent,
                    center: [78.9629, 20.5937],
                    scale: 22000000 //zoom: 5
                });
                //alert("himanshu");
            })
            .catch(function(err) {
                // A rejected view indicates a fatal error making it unable to display.
                // Use the errback function to handle when the view doesn't load properly
                console.error("MapView rejected:", err);
            });

        districtLayer.when(function() {


            //console.log(districtLayer.queryExtent());
            view.when(function() {
                    view.ui.components = ["attribution"];
                    view.watch("widthBreakpoint", (breakpoint) => {
                        switch (breakpoint) {
                            case "xsmall":
                                updateView(true);
                                break;
                            case "small":
                            case "medium":
                            case "large":
                            case "xlarge":
                                updateView(false);
                                break;
                            default:
                        }
                    });
                    // MapView is now ready for display and can be used. Here we will
                    // use goTo to view a particular location at a given zoom level and center
                    // view.goTo({
                    //   //extent:districtLayer.fullExtent,
                    //center: [79.0882, 21.1458],
                    //  scale:450000,    //zoom: 5
                    // });
                    //alert("himanshu");
                })
                .catch(function(err) {
                    // A rejected view indicates a fatal error making it unable to display.
                    // Use the errback function to handle when the view doesn't load properly
                    console.error("MapView rejected:", err);
                });
        });


        view.on("key-down", (event) => {
            const prohibitedKeys = ["+", "-", "Shift", "_", "="];
            const keyPressed = event.key;
            if (prohibitedKeys.indexOf(keyPressed) !== -1) {
                event.stopPropagation();
            }
        });


        view.on("mouse-wheel", (event) => {
            event.stopPropagation();
        })


        view.on("double-click", (event) => {
            event.stopPropagation();
        });

        view.on("double-click", ["Control"], (event) => {
            event.stopPropagation();
        });

        view.on("drag", (event) => {
            event.stopPropagation();
        });

        view.on("drag", ["Shift"], (event) => {
            event.stopPropagation();
        });

        view.on("drag", ["Shift", "Control"], (event) => {
            event.stopPropagation();
        });



        //view.container= "viewDiv";
        //view.extent = districtLayer.fullExtent;
        //console.log(view.extent);
        // console.log(districtLayer.fullExtent);

        //view.goTo(districtLayer.fullExtent);
        view.extent = districtLayer.fullExtent;

        //console.log(view.extent);


        //   view.extent = districtLayer.fullExtent;
        // });
        //});
        //}


        //map.add(districtLayer);
        //map.add(stateLayer);
        // districtLayer.queryFeatures().then(function(results){
        //   alert("fgfdgdfgd");
        // console.log(results.features);
        //results.features[0].attributes['STNAME'] = 'HARYANA';
        //console.log(results.features[0].attributes);
        // });

        view.popup.autoOpenEnabled = false;

 view.on("pointer-move", function(event) {
            console.log(event);

            view.hitTest(event)
                .then(function(response) {


if(response.results.length ==0)
{
    document.getElementById("viewDiv").style.cursor = "default";
    return;

}
document.getElementById("viewDiv").style.cursor = "pointer";

                });
        });

        view.on("click", function(event) {
            console.log(event);

            view.hitTest(event)
                .then(function(response) {
                    // console.log(event);
                    //console.log(view.toMap(event));
                    //document.getElementById("Temp").innerHTML = "This is cool"+response.results[0].graphic.attributes.dtname;

                    // console.log(response.results[0].graphic.attributes.OBJECTID);
                    //console.log(response.results);
                    //debugger;
                    //popupTrailheads.content = "{STNAME}"+t[popupTrailheads.title];
                    //popupTrailheads
                    //stateLayer.popupTemplate = popupTrailheads;
                    //console.log(popupTrailheads.content);
                    //console.log(event);
                    //var x = event.mapPoint.latitutde;
                    //var y = event.y;
                    //alert("This is great");
                    //view.popup.actions = [];
                        view.popup.dockOptions = {
  // Set a custom breakpoint
  // Dock popup when view is less than or equal to 600x1000 pixels
  breakpoint: {
    width: 10,
    height: 10
  }
};
if(response.results.length ==0)
{
    view.popup.close();
    return;
}
view.popup.alignment = "auto";
                    view.popup.open({
                        title: response.results[0].graphic.attributes.dtname,
                        content: demo_function(response.results[0]),
                        //location: view.toMap(event),
                        actions: []
                    });


                });
        });

        view.on("click", function(event) {
            view.hitTest(event)
                .then(function(response) {
                  //console.log(response.results[0].graphic.sourceLayer.id);
                  if(response.results[0].graphic.sourceLayer.id=="stateLayer")
                  {

                  // event is the event handle returned after the event fires.
                    //alert(response.results[0].graphic.attributes.OBJECTID);
                    //window.location.href = "{{ url('district-wise-khelo-india-centers') }}/" +
                    //    response.results[0].graphic.attributes.STCODE11;
                  }
                })
        });


        // stateLayer.on("layerview-create", function(event){
        //  console.log(stateLayer.fields[0].name);
        //console.log(stateLayer.isEditable());

        //console.log(featureLayer.getField("NLFID"));
        //});
        //stateLayer.load().then(() => {
        //console.log(stateLayer.fields);
        //});
        stateLayer.queryFeatures().then(function(results) {
            //console.log(results.features[0]);
            //results.features[0].attributes['STNAME'] = 'HARYANA'
        });
        // console.log(stateLayer.getFields());
        //stateLayer.destroy();
        const graphicsLayer = new GraphicsLayer();
        graphicsLayer.id = "Graphics Layer";

    map.layers.push(graphicsLayer);
        //map.add(graphicsLayer,1);
        //map.reorder(graphicsLayer,2);

        const point = { //Create a point
            type: "point",
            longitude: 78,
            latitude: 20
        };
        let simpleMarkerSymbol = {
  type: "picture-marker",  // autocasts as new PictureMarkerSymbol()
  url: "{{asset('public/front/assets/images/svg/map_location.svg')}}",
  width: "24px",
  height: "24px"
};
        let lat = [
            22.6708,
            22.566962,
            22.5668784,
            22.56709733,
            22.56616725,
            22.5669607,
            22.56650153,
            22.56614,
            22.56484158,
            22.56584639,
            22.5789596,
            22.5843816,
            22.562125,
            22.9501427,
            22.56620192,
            22.87051667,
            22.5661054,
            22.566808,
            22.5660018,
            22.5667247,
            29.43843869,
            22.5660372,
            22.5656682,
            22.5758639,
            22.5661018,
            22.60736062,
            12.94064738,
            22.5663072,
            22.5662464,
            22.56645291,
            22.5667465,
            22.5661413,
            22.5669479,
            22.5735724,
            22.5630983,
            22.56616167,
            29.33061667,
            22.56599871,
            22.5671219,
            22.5669624,
            22.5668885,
            22.5660736,
            22.56544833,
            23.38434585,
            22.6846645,
            22.5659475,
            22.56490123,
            22.91806333,
            22.5662596,
            22.56350574,
            22.5660666,
            22.5667384,
            22.5671189,
            22.5660149,
            22.5661764,
            22.5668966,
            22.5668897,
            22.56657885,
            22.5642607,
            22.5668496,
            22.56617667,
            22.5661942,
            22.56606592,
            22.4782022,
            22.87399806,
            22.56485167,
            22.5669421,
            22.1515657,
            22.15023833,
            22.56604628,
            22.7302083,
            22.419223,
            22.5661199,
            22.566515,
            22.56648167,
            22.65238167,
            22.56648241,
            22.566182,
            22.566944,
            22.56324267,
            22.56644667,
            22.56331257,
            22.56320833,
        ];
        let long = [
            71.5724,
            88.4072364,
            88.4100403,
            88.4066648666666,
            88.40702708,
            88.4072365,
            88.4098183,
            88.4076116666666,
            88.41011313,
            88.4087448008358,
            88.30252482,
            88.3423657,
            88.4088183333333,
            88.3974074,
            88.40672887,
            88.4152966666666,
            88.4074449,
            88.410731,
            88.4056962,
            88.4072596,
            76.97498712,
            88.4102419,
            88.4096365,
            88.294036,
            88.4073487,
            88.2944127833333,
            77.51597842,
            88.4069281,
            88.406827,
            88.4069362,
            88.4056962,
            88.4069789,
            88.4072231,
            88.3981741,
            88.4086907,
            88.4077683333333,
            76.4824716666666,
            88.40665839,
            88.4059993,
            88.4072325,
            88.410041,
            88.407323,
            88.4074816666666,
            85.32974182,
            88.3935701,
            88.4101386,
            88.41016483,
            88.3933649999999,
            88.4103904,
            88.4098365437239,
            88.4073176,
            88.4106896,
            88.4056962,
            88.4073238,
            88.4070129,
            88.4100386,
            88.4070315,
            88.40698492,
            88.4080067,
            88.4100193,
            88.4068316666666,
            88.4069796,
            88.40696808,
            88.374727,
            88.42965845,
            88.4100833333333,
            88.407217,
            88.4144855,
            88.410685,
            88.40842307,
            88.3834765,
            88.4138598,
            88.4072649,
            88.4072666666666,
            88.40713,
            88.329655,
            88.40690401,
            88.4070098,
            88.4072221,
            88.40863381,
            88.4069966666666,
            88.40837365,
            88.4087483333333,
        ];
        let status = [
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'A',
            'A',
            'P',
            'A',
            'P',
            'A',
            'P',
            'P',
            'P',
            'P',
            'A',
            'P',
            'P',
            'A',
            'P',
            'A',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'A',
            'P',
            'P',
            'A',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'A',
            'A',
            'P',
            'P',
            'A',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'A',
            'A',
            'P',
            'P',
            'A',
            'A',
            'P',
            'A',
            'A',
            'P',
            'P',
            'P',
            'A',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P',
            'P'
        ]
        let ath_name = [
            'Aakansha ',
            'Aaradhya  Rajpoot',
            'Abhay Gaur',
            'ABHILASHA  BHATTACHARJEE',
            'ABHINAY MINZ',
            'ADITA MONDAL',
            'AKASH MONDAL',
            'ALISHA  PARWEEN',
            'Anjisnu  Bhandari',
            'ANTARA  CHOWDHURY',
            'ANTARA DAS',
            'ANUSHKA JANA',
            'Arohi Roy',
            'ARTHITA DEY',
            'Avinash kumar ojha ',
            'Ayush  Debnath ',
            'BASANTI MAHATO',
            'BASANTI MAHATO',
            'Chaudhari  Hetvi',
            'Dewgi Kandir',
            'HIMANSHI  MALIK',
            'HIMASHREE ROY',
            'JAMUNA  EKKA',
            'JINIA  DEBNATH',
            'Kapil Raghuvanshi',
            'Koushik  Mondal ',
            'Lili Das',
            'LILY  ORAM',
            'Mahi Rajpoot',
            'Mamoni  Biswas',
            'MAXIMA TOPPO',
            'MIR MUHAIMIN',
            'MONIKA SAREN',
            'MONIKA SAREN',
            'MRUTYUNJAYA PATTANAIK',
            'Navneet ',
            'NIDHI ',
            'NISHANT ',
            'Nusharth  Parveen',
            'Parmi Nagdeve',
            'Parth Prabhakar',
            'POONAM  MUNDU',
            'POULAMI SADHUKHAN',
            'Pramila Kumari',
            'Priyash Dutta',
            'RAHUL  YADAV',
            'Ranjini Saha',
            'RATUL DEY',
            'ROHAN GHOSH',
            'Rudra Jana',
            'Ruma Biswas',
            'Ruma Biswas',
            'Rutuja Kasal',
            'Sadanand Kumar',
            'SAHIL JADHAV ',
            'Samrat Malik',
            'SANJNA hORO',
            'SAPNA BHENGRA',
            'SATYAJIT MONDAL',
            'Satyam  Vaidwan ',
            'SAURABH SINGH',
            'Sayan  Biswas',
            'Shiva sai ',
            'SHOUNAK GUHA',
            'Shrestho Chakraborty',
            'Shrijoyee Mukherjee',
            'SNEHA BARAI',
            'Sohan  Haque ',
            'Sohan  Haque ',
            'Soumita  Paul',
            'Sreejoyee Saha',
            'Srijit  Bhattacharya',
            'SRUSHTI PATIL JOGDAND',
            'SUBILA TIRKEY',
            'SUJATA  KUJUR',
            'SUMAN DUTTA',
            'SUSHMITA PANNA',
            'SWASTIDIPA KARMAKAR',
            'Tahura Khatun',
            'TAPAN  MOHANTY',
            'Vidhi ',
            'VIRENDRA KUMAR',
            'Vishal Jadhav',
        ]
        for (let i = 0; i < map_location.length; i++) {
            point.latitude = map_location[i][0];
            point.longitude = map_location[i][1];

            //simpleMarkerSymbol.color = [0, 64, 0];
            const pointGraphic = new Graphic({
                geometry: point,
                symbol: simpleMarkerSymbol,
                //attributes: {
                //    ath_name: ath_name[i],
                //    status: status[i],
                //    lat: lat[i],
                //    long: long[i]
                //},
                //popupTemplate: ath_details_popup

            });
            graphicsLayer.add(pointGraphic);
            // console.log(i);

        }
        view.on("layerview-create", function(event) {
            // The event contains the layer and its layer view that has just been
            // created. Here we check for the creation of a layer view for a layer with
            // a specific id, and log the layer view
            //alert('done');
            // The LayerView for the desired laye
            //$.LoadingOverlay("hide");
            console.log(event.layer.id);
            if (event.layer.id == "stateLayer") {
                $.LoadingOverlay("hide");
                //map.add(graphicsLayer);
                 //alert("I am done");
           }
            //console.log();
        })
    });
</script>

