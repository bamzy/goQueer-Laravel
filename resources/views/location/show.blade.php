@extends('dashboard')

@section('section')
    <script type="text/javascript" src="{{ URL::asset('js/src/leaflet-src.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('js/src/Leaflet.draw.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/Leaflet.Draw.Event.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/leaflet.draw.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('js/src/Toolbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/Tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/GeometryUtil.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/LatLngUtil.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/LineUtil.Intersect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/Polygon.Intersect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/Polyline.Intersect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/TouchEvents.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/DrawToolbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Feature.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.SimpleShape.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Polyline.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Circle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Marker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Polygon.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Rectangle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/EditToolbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/EditToolbar.Edit.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/EditToolbar.Delete.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/Control.Draw.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Poly.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.SimpleShape.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Circle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Rectangle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Marker.js') }}"></script>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Location</h2>
            </div>

        </div>
    </div>

    <div class="row pull-right">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group" >
                <div id="mapid1" style="width: 500px; height: 300px"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Coordinates:</strong>
                <div id="coordinates"> {{ $location->coordinate }} </div>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $location->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $location->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $location->description }}
            </div>
        </div>

    </div>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('location.index') }}"> Back</a>
    </div>
    <script>
        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">Go Queer</a>',
                osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib }),
                map = new L.Map('mapid1', { center: new L.LatLng(53.523631, -113.5335), zoom: 11 }),
                drawnItems = L.featureGroup().addTo(map);
        L.control.layers({'osm': osm.addTo(map), "google": L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}',
                {
                    attribution: 'google'
                })}, { 'drawlayer': drawnItems },
                { position: 'topleft', collapsed: true }
        ).addTo(map);
        function codeAddress() {
            var json = JSON.parse(coordinates.innerText);
            L.geoJSON(json).addTo(map);
            console.log(json["geometry"]["coordinates"]);
        }
        window.onload = codeAddress;
    </script>

@endsection