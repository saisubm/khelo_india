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
<div class="state-wise-count py-5 khelo-india-summary landing-tiles">
    <div class="container">
        <div class="row align-items-center" style=" font-size: 33px; font-weight:700; padding:5px; border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3">
                <button type="button" onclick="{history.back()}" class="background-light border-0"
                    style="background-color: transparent !important;">
                    <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg') }}"
                        class="img-fluid backward-arrow d-block mx-auto" alt="">
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
                <h2 class="text-center" style="font-size: 33px; font-weight:700; ">Khelo India State Centres of Excellence (KISCE)</h2>
            </div>
        </div>
        <div id="khelo-india-centers"
        style="background-color: white !important; border:0px !important; padding:0px 0px;">
        <div class="container">
            <div class="row">
                <div class="heading mb-2">

                </div>
            </div>
            <div class="row py-5">
                {{-- <h2 class="text-center mb-3" style="font-size: 36px; font-weight: 700;">KHELO INDIA AT A GLANCE</h2> --}}
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="khelo-summary summary-tile-1">
                            <div class="row justify-content-between align-items-center mb-2">
                                <div class="col-auto">
                                    <div class="summary-number summary-number-1">
                                        <h3>{{$kisce_count->count_kicse ?? '0'}}</h3>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <img src="{{asset('public/front/assets/images/s-img-1.png')}}" alt="">
                                </div>
                            </div>
                            <div>
                                <p class="m-0">Notified KICSE's Pan-India</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                   <a href="javascript:void(0)" class="text-decoration-none">
                    <div class="khelo-summary summary-tile-2">
                        <div class="row justify-content-between align-items-center mb-2">
                            <div class="col-auto">
                                <div class="summary-number summary-number-2">
                                    <h3>{{$kisce_count->state_count ?? '0'}}</h3>
                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="{{asset('public/front/assets/images/svg/s-img-2.svg')}}" alt="">
                            </div>
                        </div>
                        <div>
                            <p class="m-0">States/UT's where KICSE's have been notified</p>
                        </div>
                    </div>
                   </a>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="javascript:void(0)" class="text-decoration-none">
                    <div class="khelo-summary summary-tile-3">
                        <div class="row justify-content-between align-items-center mb-2">
                            <div class="col-auto">
                                <div class="summary-number summary-number-3">
                                    <h3>{{$kisce_count->discipline_count ?? '0'}}</h3>
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

                </div>

        </div>
    </div>
        <div class="row my-5">
            <div class="row">


            </div>
            <div class="col-md-12 col-12">
                <div class="d-flex justify-content-end">

                </div>
               <div class="border py-2">
                <div class="row justify-content-between  pb-2 px-2">

                       <div class="col-lg-8 col-md-12 col-12">
                        <h5 class=" py-2 text-center">State Wise Distribution of KISCE</h5>
                       </div>


                       <div class="col-lg-4 col-md-12 col-12 mb-md-0 mb-2">
                        <select class="form-select w-50  state_drop d-block ms-lg-auto mx-md-auto mx-auto" aria-label="Default select example" >
                            <option selected disabled>Select State</option>
                            @foreach($state_list as $k => $val)
                            <option value="{{$k}}">{{$val}}</option>
                            @endforeach
                        </select>
                       </div>

                </div>
                <div id="viewDiv" title="Click on any State to view KISCE Details" class="border-top" style="min-height: 95vh !important;padding:2px 0px;  ">
                    {{-- <img src="images/svg/state-wise-data.svg" alt=""> --}}
                </div>
                <div class="row justify-content-center py-1">
                    <div class="col-md-6 col-12">
                        <div class="progress" style="height: 25px">
                            <div class="progress-bar text-dark fs-6" title="No KISCE" role="progressbar" style="background-color:#fee5d9; width: 50%;"><span class="spl_text">No KISCE</span></div>
                            <div class="progress-bar  text-dark fs-6" title="KISCE is Present" role="progressbar" style="background-color:#6baed6; width: 50%;"><span class="spl_text">KISCE is Present</span></div>

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
var data = <?php echo $kisce_details ?>;;
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


        function demo_function(feature) {
            //console.log(t[feature.graphic.attributes.OBJECTID]);
var html = ``;
if(!(feature.graphic.attributes.STCODE11 in data_dict)){
html +=`<tr>
    <td colspan="2" class="text-center">No KISCE from this State/UT</td>
    </tr>`
}else{
html +=`<tr>
                 <td >KICSE's Total</td>
                  <th>${data_dict[feature.graphic.attributes.STCODE11].count}</th>
                </tr>`;
}
 return `<div class="col-12">
            <h6 class="text-center" >KICSE DETAILS FOR `+feature.graphic.attributes.STNAME+`</h6>
         <div class='table-responsive'>
            <table class="table table-bordered">
               <tbody>
                ${html}
              </tbody>
            </table>
         </div>
        </div>`;

        }

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

        };
        labelClass.deconflictionStrategy = "static";


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
                renderer.uniqueValueInfos.push({
                // All features with value of "North" will be blue
                    value: state_code,
                    symbol: {
                        type: "simple-fill", // autocasts as new SimpleFillSymbol()
                        color: "#6baed6"
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

        })







        districtLayer.renderer = renderer;
        districtLayer.enableLabels = false;

        districtLayer.refresh();

        var view = new MapView({
            map: map,
            center: [79.0882, 21.1458], // Longitude, latitude


            container: "viewDiv", // Div element
            highlightOptions: {
                color: "lightblue",
                haloColor: "darkorange",
                haloOpacity: "0"
            }
        });

        view.when(function() {
                map.add(districtLayer);

                view.goTo({

                    center: [78.9629, 20.5937],
                    scale: 22000000 //zoom: 5
                });
                //alert("himanshu");
            })
            .catch(function(err) {

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

                })
                .catch(function(err) {

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




        view.extent = districtLayer.fullExtent;



        view.popup.autoOpenEnabled = false;

        // view.on("pointer-move", function(event) {
        //     console.log(event);

        //     view.hitTest(event)
        //         .then(function(response) {
        //             view.popup.alignment = "top-left";
        //             view.popup.open({
        //                 title: response.results[0].graphic.attributes.dtname,
        //                 content: demo_function(response.results[0]),
        //                 //location: view.toMap(event),
        //                 actions: []
        //             });

        //       });
        // });

        view.on("pointer-move", function(event) {
            view.hitTest(event)
                .then(function(response) {
                document.getElementById("viewDiv").style.cursor = "default";
                if((response.results[0].graphic.attributes.STCODE11 in data_dict)){
                 if(response.results[0].graphic.sourceLayer.id=="stateLayer")
                 {
                   document.getElementById("viewDiv").style.cursor = "pointer";
                 }
                }
                })
        });


        view.on("click", function(event) {
            view.hitTest(event)
                .then(function(response) {
                 if((response.results[0].graphic.attributes.STCODE11 in data_dict)){
                  if(response.results[0].graphic.sourceLayer.id=="stateLayer")
                  {

                    window.location.href = "{{ url('kisce-details') }}/" + encodeURIComponent(window.btoa(response.results[0].graphic.attributes.STCODE11));

                  }
                }
                })
        });




        const graphicsLayer = new GraphicsLayer();
        graphicsLayer.id = "Graphics Layer";
        map.add(graphicsLayer);

       view.on("layerview-create", function(event) {

            console.log(event.layer.id);
            if (event.layer.id == "stateLayer") {
                $.LoadingOverlay("hide");

            }

        })
    });

    $(document).on('change','.state_drop',function(){
        var id = $(this).val();
       if(id in data_dict){
        window.location.href = "{{ url('kisce-details') }}/" + encodeURIComponent(window.btoa(id));
       }else{
        alert('No KISCE from this State/UT');
       }
    })
</script>
