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

    .table-striped>tbody>tr:nth-child(odd)>td,
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #ff8100; // Choose your own color here
 }
</style>
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://js.arcgis.com/4.25/esri/themes/light/main.css">
<div class="state-wise-count py-5">
    <div class="container">

        <div class="row align-items-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3">
                <button type="button" onclick="{history.back()}" class="background-light border-0" style="background-color: transparent !important">
                    <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                        alt="" />
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
              <h2 class="text-center" style="font-size: 33px; font-weight:700; ">Khelo India Centres (KICs)</h2>
            </div>
          </div>
          <div class="khelo-india-summary landing-tiles">
            <div class="container">

            <div class="row py-5">

            <div class="col-lg-4 col-md-6 col-12">
                {{-- <a href="{{url('participation-khelo-india-games-dasboard')}}" class="text-decoration-none"> --}}
                <a href="#" class="text-decoration-none">
                    <div class="khelo-summary summary-tile-1">
                        <div class="row justify-content-between align-items-center mb-2">
                            <div class="col-auto">
                                <div class="summary-number summary-number-1">
                                    <h3>{{$kic_count ?? '0'}}</h3>
                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                            </div>
                        </div>
                        <div>
                            <p class="m-0">Notified KIC's Pan-India</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
               {{-- <a href="https://fitindia.gov.in/schooldashboard" class="text-decoration-none"> --}}
               <a href="#" class="text-decoration-none">
                <div class="khelo-summary summary-tile-2">
                    <div class="row justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                            <div class="summary-number summary-number-2">
                                <h3>{{$state_count ?? '0'}}</h3>
                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{asset('public/front/assets/images/svg/s-img-2.svg')}}" alt="">
                        </div>
                    </div>
                    <div>
                        <p class="m-0">States/UT's where KIC's have been notified</p>
                    </div>
                </div>
               </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                {{-- <a href="{{route('GetFinancialAssitanceAthleteSummary')}}" class="text-decoration-none"> --}}
                <a href="#" class="text-decoration-none">
                <div class="khelo-summary summary-tile-3">
                    <div class="row justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                            <div class="summary-number summary-number-3">
                                <h3>{{$discipline_count ?? '0'}}</h3>
                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{asset('public/front/assets/images/svg/s-img-3.svg')}}" alt="">
                        </div>
                    </div>
                    <div>
                        <p class="m-0">Disciplines across all KIC's</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                {{-- <a href="{{url('coaches-support-staff')}}" class="text-decoration-none"> --}}
                <a href="#" class="text-decoration-none">
                <div class="khelo-summary summary-tile-4">
                    <div class="row justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                            <div class="summary-number summary-number-4">
                                <h3>{{$district_count ?? '0'}}</h3>
                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{asset('public/front/assets/images/svg/s-img-2.svg')}}" alt="">
                        </div>
                    </div>
                    <div>
                        <p class="m-0">Districts Where KIC's have been notified</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                {{-- <a href="https://fitindia.gov.in/schooldashboard" class="text-decoration-none"> --}}
                <a href="#" class="text-decoration-none">
                <div class="khelo-summary summary-tile-5">
                    <div class="row justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                            <div class="summary-number summary-number-5">
                                <h3>{{$coach_count ?? '0'}}</h3>
                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                        </div>
                    </div>
                    <div>
                        <p class="m-0">Champion Athletes engaged as Trainers KIC's</p>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                {{-- <a href="{{url('academic_support')}}" class="text-decoration-none"> --}}
                <a href="#" class="text-decoration-none">
                <div class="khelo-summary summary-tile-6">
                    <div class="row justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                            <div class="summary-number summary-number-6">
                                <h3>{{$athletes_count ?? '0'}}</h3>
                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                        </div>
                    </div>
                    <div>
                        <p class="m-0">Athletes training across KIC's</p>
                    </div>
                </div>
            </a>
            </div>
            </div>
            </div>
            </div>





        <div class="row my-5">
            <div class="row">


            </div>
            <div class="col-md-12 col-12">
                {{-- <div class="d-flex justify-content-end">
                    <select class="form-select w-25 mb-3" aria-label="Default select example">
                        <option selected>select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div> --}}

                <div style="border:1px solid grey;padding:2px 0px;">
                <h4 class="text-center mb-2 " >State Wise distribution of KICs</h4>
                     <div id="viewDiv" title="Click on the State/UT to view State/UT wise KIC details" style="min-height: 95vh !important;  ">
                    {{-- <img src="images/svg/state-wise-data.svg" alt=""> --}}
                </div>

                <div class="row justify-content-center py-1">
                        <div class="col-md-8 col-12">
                            <div class="progress" style="height: 25px">
                                <div class="progress-bar text-dark fs-6 " title="No KIC" role="progressbar" style="background-color:#fee5d9; width: 17%;"><span class="spl_text">No KIC</span></div>
                                <div class="progress-bar  text-dark fs-6 " title="&lt; 20 KICs" role="progressbar" style="background-color:#fcae91; width: 16%;"><span class="spl_text">&lt; 20 KICs</span></div>
                                <div class="progress-bar text-dark fs-6 " title="&lt; 40 KICs" role="progressbar" style="background-color:#bdd7e7; width: 17%;"><span class="spl_text">&lt; 40 KICs</span></div>
                                <div class="progress-bar  text-dark fs-6 " title="&lt; 60 KICs" role="progressbar" style="background-color:#6baed6; width: 16%;"><span class="spl_text">&lt; 60 KICs</span></div>
                                <div class="progress-bar text-dark fs-6 " title="&lt; 80 KICs" role="progressbar" style="background-color:#3182bd; width: 17%;"><span class="spl_text">&lt; 80 KICs</span></div>
                                <div class="progress-bar  text-dark fs-6 " title="&ge; 80 KICs" role="progressbar" style="background-color:#08519c; width: 17%;"><span class="spl_text">&ge; 80 KICs</span></div>


                              </div>
                        </div>
                    </div>
           </div>
                </div>

            </div>

        </div>
    </div>
</div>

@include('includes.footer')
<script src="https://js.arcgis.com/4.25/"></script>
<script src="{{asset('public/front/global.js')}}"></script>

<script>


console.log(state_district["01"]);
    var data = <?php echo $data ?>;
    var data_dict = {};
    for (i=0;i<data.length;i++)
    {
        data_dict[data[i].state_code] = data[i];
    }

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
            if(!(feature.graphic.attributes.STCODE11 in data_dict))
            {
                return `
          <div class="col-12">
            <h6 class="text-center" >KIC details for `+feature.graphic.attributes.STNAME+`</h6>
           <div class='table-responsive'>
            <table class="table table-bordered">

 <tbody>
   <tr>
     <td class="text-center">No KIC available for this State/UT</td>
      </tr>


 </tbody>
</table>
            </div>

            </div>

           `;
            }

            return `
          <div class="col-12">
            <h6 class="text-center" >KIC details for `+feature.graphic.attributes.STNAME+`</h6>
           <div class='table-responsive'>
            <table class="table table-bordered">

 <tbody>
   <tr>
     <td >KIC's</td>
     <th>${data_dict[feature.graphic.attributes.STCODE11].count_kic}</th>
      </tr>
      <tr>
     <td >Disciplines</td>
     <th>${data_dict[feature.graphic.attributes.STCODE11].count_discipline}</th>
      </tr>
      <tr>
     <td >Districts Covered</td>
     <th>${data_dict[feature.graphic.attributes.STCODE11].count_district}</th>
      </tr>
      <tr>
     <td >No. of Trainers</td>
     <th>${data_dict[feature.graphic.attributes.STCODE11].count_coaches}</th>
      </tr>


 </tbody>
</table>
            </div>

            </div>

           `;

        }
        //view.on("click", function (event) {
        //	alert(event.x);
        //});?????????????????????????????????????????????????????????
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

            if(state_code in data_dict){
                var color_code = "";
                var kic_count = data_dict[state_code].count_kic;
                console.log(kic_count);
                if(kic_count < 20)
                {
                    color_code = "#fcae91";
                }
                else if(kic_count < 40)
                {
                    color_code = "#bdd7e7";
                }
                else if (kic_count < 60)
                {
                    color_code = "#6baed6";

                }

                else if (kic_count < 80)
                {
                    color_code = "#3182bd";

                }
                else
                {
                    color_code = "#08519c";

                }
                renderer.uniqueValueInfos.push({
                // All features with value of "North" will be blue
                    value: state_code,
                    symbol: {
                        type: "simple-fill", // autocasts as new SimpleFillSymbol()
                        color: color_code,
                    }
                });
            }
            else
            {
                renderer.uniqueValueInfos.push({
                // All features with value of "North" will be blue
                    value: state_code,
                    symbol: {
                        type: "simple-fill", // autocasts as new SimpleFillSymbol()
                        color: "#fee5d9"
                    }
                });
            }

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

                    if(response.results.length == 0)
                    {
                        view.popup.close();
                        document.getElementById("viewDiv").style.cursor = "default";

                        return;

                    }
                    document.getElementById("viewDiv").style.cursor = "pointer";

                    view.popup.open({
                        title: response.results[0].graphic.attributes.dtname,
                        content: demo_function(response.results[0]),
                        //location: view.toMap(event),
                        actions: []
                    });




                    // features:[districtLayer],
                    // fetchFeatures: true


                    //});
                    //  ({ // <- open popup
                    // location: event.mapPoint, // <- use map point of the click event
                    // fetchFeatures: true // <- fetch the selected features (if any)
                    //});
                    console.log("This is Great");
                    // do something with the result graphic
                    //var graphic = response.results[0].graphic;
                    //alert(graphic);
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
                    if(response.results[0].graphic.attributes.STCODE11 in data_dict )
                    {
                        window.location.href = "{{ url('district-wise-khelo-india-centers') }}/" +
                        response.results[0].graphic.attributes.STCODE11;
                  }
                  else
                  {
                    alert("No KIC notified for this State/UT");
                  }
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
        map.add(graphicsLayer);

        const point = { //Create a point
            type: "point",
            longitude: 78,
            latitude: 20
        };
        const simpleMarkerSymbol = {
            type: "simple-marker",
            color: [226, 119, 40], // Orange
            outline: {
                color: [255, 255, 255], // White
                width: 0.2
            }
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
        // for (let i = 0; i < 83; i++) {
        //     point.latitude = lat[i];
        //     point.longitude = long[i];
        //     if (status[i] == 'A') {
        //         simpleMarkerSymbol.color = [255, 0, 0];
        //     } else {
        //         simpleMarkerSymbol.color = [0, 0, 255];
        //     }
        //     const ath_details_popup = {
        //         "title": "Attendance Details for {ath_name}",
        //         "content": "<b>{status}</b> | {lat},{long}<br>"
        //     }
        //     const pointGraphic = new Graphic({
        //         geometry: point,
        //         symbol: simpleMarkerSymbol,
        //         attributes: {
        //             ath_name: ath_name[i],
        //             status: status[i],
        //             lat: lat[i],
        //             long: long[i]
        //         },
        //         popupTemplate: ath_details_popup

        //     });
        //     graphicsLayer.add(pointGraphic);
        //     // console.log(i);

        // }
        view.on("layerview-create", function(event) {
            // The event contains the layer and its layer view that has just been
            // created. Here we check for the creation of a layer view for a layer with
            // a specific id, and log the layer view
            //alert('done');
            // The LayerView for the desired laye
            console.log(event.layer.id);
            if (event.layer.id == "stateLayer") {
                $.LoadingOverlay("hide");
                // alert("I am done");
            }
            //console.log();
        })
    });
</script>
