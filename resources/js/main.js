import View from 'ol/View';
import Map from 'ol/Map';
import { Vector as VectorLayer, Tile as TileLayer, Group } from 'ol/layer';
import { OSM, Stamen, Vector as VectorSource, XYZ } from 'ol/source';
import { MousePosition, ScaleLine, Control } from 'ol/control';
import { GeoJSON } from 'ol/format';
import { toStringXY } from 'ol/coordinate';
import { Style, Stroke, Fill, Circle, RegularShape, Text } from 'ol/style';
import { Draw } from 'ol/interaction';
import { Polygon, LineString, Point, MultiLineString, MultiPoint } from 'ol/geom';
import Overlay from 'ol/Overlay';
import { getLength, getArea } from 'ol/sphere';
import { fromLonLat } from 'ol/proj.js';
import LayerSwitcher from 'ol-ext/control/LayerSwitcher';
import { unByKey } from 'ol/Observable.js';
import Notification from 'ol-ext/control/Notification';
import Tooltip from 'ol-ext/overlay/Tooltip';
import Select from 'ol-ext/interaction/TouchCursorSelect';
import EditBar from 'ol-ext/control/EditBar';
import Button from 'ol-ext/control/Button';
import LegendControl from 'ol-ext/control/Legend';
import Legend from 'ol-ext/legend/Legend';
import Toggle from 'ol-ext/control/Toggle';
import TextButton from 'ol-ext/control/TextButton';
import html2canvas from 'html2canvas';
import { each, fill, transform } from 'lodash';
import { createEmpty } from 'ol/extent.js';

var mapView = new View({
    center: fromLonLat([110.536822, -7.9046881]),
    zoom: 14,
});

const map = new Map({
    target: 'map',
    view: mapView,
    controls: [],
});

const bangunan = new VectorLayer({
    title: 'Bangunan',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_bangunan',
    }),
    zIndex: 12,
    visible: false,
    style: new Style({
        image: new RegularShape({
            radius: 5,
            points: 4,
            fill: new Fill({
                color: 'red',
            }),
            stroke: new Stroke({
                width: 2,
                color: 'black',
            }),
        }),
    }),
});

const ujiPetak = new VectorLayer({
    title: 'Petak Uji',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_batasuji',
    }),
    zIndex: 11,
    visible: true,
    style: new Style({
        stroke: new Stroke({
            width: 2,
            color: 'black',
        }),
    }),
});

const gorong = new VectorLayer({
    title: 'Gorong-gorong',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_gorong',
    }),
    zIndex: 12,
    visible: false,
    style: new Style({
        image: new Circle({
            radius: 5,
            fill: new Fill({
                color: 'rgba(255,255,255, 0)',
            }),
            stroke: new Stroke({
                width: 4,
                color: 'black',
            }),
        }),
    }),
});

const jlnAspal = new VectorLayer({
    title: 'Jalan Aspal',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_jalanaspal',
    }),
    zIndex: 11,
    visible: true,
    style: new Style({
        stroke: new Stroke({
            width: 4,
            color: 'red',
        }),
    }),
});

const jlnBatu = new VectorLayer({
    title: 'Jalan Batu',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_jalanbatu',
    }),
    zIndex: 11,
    visible: true,
    style: new Style({
        stroke: new Stroke({
            width: 2,
            color: 'black',
            lineDash: [4, 8],
            lineDashOffset: 8,
        }),
    }),
});

const permukiman = new VectorLayer({
    title: 'Permukiman',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_permukiman',
    }),
    zIndex: 10,
    visible: false,
    style: new Style({
        fill: new Fill({
            color: [250, 105, 9, 1],
        }),
        stroke: new Stroke({
            color: [0, 0, 0, 1],
        }),
    }),
});

const poin = new VectorLayer({
    title: 'Poin Keterangan',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_poinketerangan',
    }),
    zIndex: 12,
    visible: true,
    style: function (feature, resolution) {
        return new Style({
            image: new Circle({
                radius: 5,
                fill: new Fill({ color: 'rgba(255, 255, 255, 1' }),
                stroke: new Stroke({ color: 'black' }),
            }),
            text: new Text({
                textAlign: 'center',
                textBaseline: 'bottom',
                text: feature.get('ket'),
                font: '10px Arial,sans-serif',
                weight: 'Bold',
                fill: new Fill({ color: 'white' }),
                stroke: new Stroke({
                    color: 'black',
                    width: 4,
                }),
                offsetX: 10,
                offsetY: 15,
                rotation: 0,
            }),
        });
    },
    declutter: true,
});

const sungai = new VectorLayer({
    title: 'Sungai',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/w05_sungai',
    }),
    zIndex: 11,
    visible: true,
    style: new Style({
        fill: new Fill({
            color: 'rgb(12,200,240)',
        }),
        stroke: new Stroke({
            width: 1,
            color: 'rgb(12, 200, 240)',
        }),
    }),
});

const lokasi = new VectorLayer({
    title: 'Batas Petak',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/bataspetak',
    }),
    zIndex: 10,
    visible: true,
    style: function (feature, resolution) {
        return new Style({
            fill: new Fill({ color: 'rgba(255, 255, 255, 0.5' }),
            stroke: new Stroke({ color: 'black' }),
            text: new Text({
                textAlign: 'center',
                textBaseline: 'bottom',
                text: feature.get('Petak'),
                font: '30px Calibri,sans-serif',
                weight: 'Bold',
                fill: new Fill({ color: 'white' }),
                stroke: new Stroke({
                    color: 'black',
                    width: 3,
                }),
                offsetX: 10,
                offsetY: 15,
                rotation: 0,
                zIndex: 1000,
            }),
        });
    },
});

const jenisTanah = new VectorLayer({
    title: 'Jenis Tanah',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/jenistanah',
    }),
    zIndex: 10,
    visible: false,
    style: function (feature, resolution) {
        if (feature.get('jenis_tnh') === 'MEDIT.MERAH&RENDZINA') {
            return new Style({
                fill: new Fill({ color: 'rgba(170, 87, 9, 1' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('jenis_tnh') === 'RENDZINA') {
            return new Style({
                fill: new Fill({ color: 'rgba(120, 30, 15, 1' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
    },
    declutter: false,
});

const lereng = new VectorLayer({
    title: 'Kelerengan',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/lereng',
    }),
    zIndex: 10,
    visible: false,
    style: function (feature, resolution) {
        if (feature.get('ket') === 'Datar') {
            return new Style({
                fill: new Fill({ color: 'rgba(16, 176, 70, 1' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('ket') === 'Landai') {
            return new Style({
                fill: new Fill({ color: 'rgba(126, 241, 10, 1' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('ket') === 'Berombak') {
            return new Style({
                fill: new Fill({ color: 'rgba(243, 239, 9, 1' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('ket') === 'Lereng') {
            return new Style({
                fill: new Fill({ color: 'rgba(248, 161, 3, 1' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('ket') === 'Curam') {
            return new Style({
                fill: new Fill({ color: 'rgba(249, 72, 8, 1' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
    },
});

const penutupLahan = new VectorLayer({
    title: 'Tutupan Lahan',
    showinfo: true,
    source: new VectorSource({
        format: new GeoJSON(),
        url: '/geojson/tutupanlahan',
    }),
    zIndex: 10,
    visible: false,
    style: function (feature, resolution) {
        if (
            feature.get('penutupan') === 'Bangunan' ||
            feature.get('penutupan') === 'Rumah Peneliti' ||
            feature.get('penutupan') === 'Museum Kayu' ||
            feature.get('penutupan') === 'Wisma Cendana' ||
            feature.get('penutupan') === 'Wanagama Paksi' ||
            feature.get('penutupan') === 'Persemaian'
        ) {
            return new Style({ fill: new Fill({ color: 'black' }), stroke: new Stroke({ color: 'white' }) });
        }
        if (feature.get('penutupan') === 'Agroforestri') {
            return new Style({
                fill: new Fill({ color: 'rgba(172, 235, 17, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Akasia') {
            return new Style({
                fill: new Fill({ color: 'rgba(38, 111, 2, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Bambu') {
            return new Style({
                fill: new Fill({ color: 'rgba(78, 130, 52, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Belukar') {
            return new Style({
                fill: new Fill({ color: 'rgba(77, 154, 61, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Cemara Udang') {
            return new Style({
                fill: new Fill({ color: 'rgba(128, 231, 8, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Danau') {
            return new Style({
                fill: new Fill({ color: 'rgba(91, 255, 237, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Duwet') {
            return new Style({
                fill: new Fill({ color: 'rgba(148, 76, 126, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Eucalyptus') {
            return new Style({
                fill: new Fill({ color: 'rgba(237, 160, 128, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Gliriside') {
            return new Style({
                fill: new Fill({ color: 'rgba(163, 122, 104, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Gmelina') {
            return new Style({
                fill: new Fill({ color: 'rgba(121, 35, 35, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Jabon') {
            return new Style({
                fill: new Fill({ color: 'rgba(204, 109, 151, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Jalan') {
            return new Style({
                fill: new Fill({ color: 'rgba(245, 30, 0, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Jati') {
            return new Style({
                fill: new Fill({ color: 'rgba(175, 84, 0, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Kayuputih') {
            return new Style({
                fill: new Fill({ color: 'rgba(152, 187, 110, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Lahan Terbuka') {
            return new Style({
                fill: new Fill({ color: 'rgba(255, 255, 255, 1)' }),
                stroke: new Stroke({ color: 'black' }),
            });
        }
        if (feature.get('penutupan') === 'Leda') {
            return new Style({
                fill: new Fill({ color: 'rgba(112, 95, 175, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Mahoni') {
            return new Style({
                fill: new Fill({ color: 'rgba(176, 202, 19, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Salam') {
            return new Style({
                fill: new Fill({ color: 'rgba(8, 142, 52, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Sungai') {
            return new Style({
                fill: new Fill({ color: 'rgba(11, 228, 245, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Tegakan Campur') {
            return new Style({
                fill: new Fill({ color: 'rgba(196, 253, 9, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
        if (feature.get('penutupan') === 'Trembesi') {
            return new Style({
                fill: new Fill({ color: 'rgba(179, 161, 9, 1)' }),
                stroke: new Stroke({ color: 'white' }),
            });
        }
    },
});

const OSMTile = new TileLayer({
    title: 'OSM',
    visible: true,
    source: new OSM(),
});

const terrain = new TileLayer({
    title: 'Terrain',
    type: 'base',
    visible: false,
    source: new Stamen({ layer: 'terrain' }),
});

const terrainLabel = new TileLayer({
    title: 'Terrain Labels',
    type: 'base',
    visible: false,
    source: new Stamen({ layer: 'terrain-labels' }),
    zIndex: 6,
});

const watercolor = new TileLayer({
    title: 'Watercolor',
    type: 'base',
    visible: false,
    source: new Stamen({
        layer: 'watercolor',
    }),
});

var satellite = new TileLayer({
    title: 'Satellite',
    type: 'base',
    visible: false,
    source: new XYZ({
        attributions: [
            'Powered by Esri',
            'Source: Esri, DigitalGlobe, GeoEye, Earthstar Geographics, CNES/Airbus DS, USDA, USGS, AeroGRID, IGN, and the GIS User Community',
        ],
        attributionsCollapsible: false,
        url: 'https://services.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
        maxZoom: 23,
    }),
});

var baseMap = new Group({
    title: 'Basemap',
    fold: true,
    layers: [terrain, terrainLabel, watercolor, satellite, OSMTile],
});

var dataHutan05 = new Group({
    title: 'Data 2005',
    fold: true,
    visible: true,
    layers: [permukiman, sungai, ujiPetak, jlnBatu, jlnAspal, gorong, bangunan, poin],
});

var dataHutan19 = new Group({
    title: 'Data 2019',
    layers: [penutupLahan, lereng, jenisTanah, lokasi],
});

map.addLayer(baseMap);
map.addLayer(dataHutan05);
map.addLayer(dataHutan19);

const featureOverlay = new VectorLayer({
    source: new VectorSource(),
    map: map,
    style: new Style({
        image: new Circle({
            stroke: new Stroke({ color: 'rgba(6, 247, 242, 1)', width: 3 }),
        }),
        stroke: new Stroke({
            color: 'rgba(6, 247, 242, 1)',
            width: 3,
        }),
    }),
});

let highlight;
const displayFeatureInfo = function (pixel) {
    const feature = map.forEachFeatureAtPixel(pixel, function (feature) {
        return feature;
    });

    if (feature !== highlight) {
        if (highlight) {
            featureOverlay.getSource().removeFeature(highlight);
        }
        if (feature) {
            featureOverlay.getSource().addFeature(feature);
        }
        highlight = feature;
    }
};

map.on('pointermove', function (evt) {
    if (evt.dragging) {
        return;
    }
    const pixel = map.getEventPixel(evt.originalEvent);
    displayFeatureInfo(pixel);
});

map.on('click', function (evt) {
    displayFeatureInfo(evt.pixel);
});

var mousePosition = new MousePosition({
    className: 'mousePosition',
    projection: 'EPSG:4326',
    coordinateFormat: function (coordinate) {
        return toStringXY(coordinate, 6);
    },
});

map.addControl(mousePosition);

const scaleControl = new ScaleLine({
    bar: true,
    text: true,
    minWidth: 100,
});

map.addControl(scaleControl);

const container = document.getElementById('popup');
const content = document.getElementById('popup-content');
const closer = document.getElementById('popup-closer');

const popup = new Overlay({
    element: container,
    autoPan: true,
    autoPanAnimation: {
        duration: 250,
    },
});

map.addOverlay(popup);

closer.addEventListener('click', function () {
    popup.setPosition(undefined);
    closer.blur();
    return false;
});

map.on('singleclick', function (evt) {
    if (typeof sketch != 'undefined' || map.get('disableinfo')) return;
    const features = map.getFeaturesAtPixel(evt.pixel, {
        layerFilter: layer => layer.get('showinfo') == true,
    });

    if (features.length < 1) return;

    const feature = features[0];

    const { geometry, ...properties } = feature.getProperties();
    let contentPopup = `<table>`;
    Object.keys(properties).forEach(key => {
        const value = properties[key];
        if (Array.isArray(value)) return;
        contentPopup += `<tr> <td style="padding-right: 10px; white-space: nowrap">${key
            .replace(/_/g, ' ')
            .toUpperCase()}</td> <td>${value}</td> </tr>`;
    });
    contentPopup += `</table>`;

    content.innerHTML = contentPopup;

    popup.setPosition(evt.coordinate);
});

const layerSwitcher = new LayerSwitcher({
    selection: true,
    collapsed: false,
});

map.addControl(layerSwitcher);

const homeButton = document.createElement('button');
homeButton.innerHTML =
    '<img src="/assets/img/home.png" style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></img>';
homeButton.className = 'myButton';

const homeElement = document.createElement('div');
homeElement.className = 'homeButtonDiv';
homeElement.relName = 'tooltip';
homeElement.title = 'Home';
homeElement.appendChild(homeButton);

const homeControl = new Control({
    element: homeElement,
});
homeButton.addEventListener('click', () => {
    location.reload();
});

map.addControl(homeControl);

//--> end home button

const fsButton = document.createElement('button');
fsButton.innerHTML =
    '<img src="/assets/img/expand.png" style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></img>';
fsButton.className = 'myButton';

const fsElement = document.createElement('div');
fsElement.className = 'fsButtonDiv';
fsElement.relName = 'tooltip';
fsElement.title = 'Fullscreen';
fsElement.appendChild(fsButton);

const fsControl = new Control({
    element: fsElement,
});

fsButton.addEventListener('click', () => {
    var mapEle = document.getElementById('map');
    if (mapEle.requestFullscreen) {
        mapEle.requestFullscreen();
    } else if (mapEle.msRequestFullscreen) {
        mapEle.msRequestFullscreen();
    } else if (mapEle.mozRequestFullscreen) {
        mapEle.mozRequestFullscreen();
    } else if (mapEle.webkitRequestFullscreen) {
        mapEle.webkitRequestFullscreen();
    }
});

map.addControl(fsControl);

//--> end of fsControl

let pointerMoveKey;

var lengthButton = document.createElement('button');
lengthButton.innerHTML =
    '<img src="/assets/img/ruler.png" style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></img>';
lengthButton.className = 'myButton';
lengthButton.id = 'lengthButton';

var lengthElement = document.createElement('div');
lengthElement.className = 'lengthButtonDiv';
lengthElement.relName = 'tooltip';
lengthElement.title = 'Length Measuring';
lengthElement.appendChild(lengthButton);

var lengthControl = new Control({
    element: lengthElement,
});

var lengthFlag = false;
lengthButton.addEventListener('click', () => {
    lengthButton.classList.toggle('clicked');
    lengthFlag = !lengthFlag;
    document.getElementById('map').style.cursor = 'default';
    if (lengthFlag) {
        map.removeInteraction(draw);
        addInteraction('LineString');
        map.set('disableinfo', true);
    } else {
        map.removeInteraction(draw);
        source.clear();
        const elements = Array.from(document.getElementsByClassName('meas-tooltip meas-tooltip-static'));
        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];
            element.remove();
        }
        unByKey(pointerMoveKey);
        helpTooltip.setPosition(undefined);
        map.set('disableinfo', false);
    }
});

map.addControl(lengthControl);

//--> end of lengthControl

var areaButton = document.createElement('button');
areaButton.innerHTML =
    '<img src="/assets/img/area.png" style="width:20px;height:20px;filter:brightness(0) invert(1);vertical-align:middle"></img>';
areaButton.className = 'myButton';
areaButton.id = 'areaButton';

var areaElement = document.createElement('div');
areaElement.className = 'areaButtonDiv';
areaElement.relName = 'tooltip';
areaElement.title = 'Area Measuring';
areaElement.appendChild(areaButton);

var areaControl = new Control({
    element: areaElement,
});

var areaFlag = false;
areaButton.addEventListener('click', () => {
    areaButton.classList.toggle('clicked');
    areaFlag = !areaFlag;
    document.getElementById('map').style.cursor = 'default';
    if (areaFlag) {
        map.removeInteraction(draw);
        addInteraction('Polygon');
        map.set('disableinfo', true);
    } else {
        map.removeInteraction(draw);
        source.clear();
        const elements = Array.from(document.getElementsByClassName('meas-tooltip meas-tooltip-static'));
        console.log(elements);
        for (let index = 0; index < elements.length; index++) {
            const element = elements[index];
            element.remove();
        }
        unByKey(pointerMoveKey);
        helpTooltip.setPosition(undefined);
        map.set('disableinfo', false);
    }
});

map.addControl(areaControl);

//--> end of areaControl

/**
 * Message to show when polygon
 * @type {string}
 */

var continuePolygonMsg = 'Click to continue polygon, Double click to complete';

/**
 * Message to show when line
 * @type {string}
 */

var continueLineMsg = 'Click to continue line, Double click to complete';

var draw;

var source = new VectorSource();
var vector = new VectorLayer({
    title: 'Vector',
    source: source,
    style: new Style({
        fill: new Fill({
            color: 'rgba(255, 255, 255, 0.2)',
        }),
        stroke: new Stroke({
            color: '#ffcc33',
            width: 2,
        }),
        image: new Circle({
            radius: 7,
            fill: new Fill({
                color: '#ffcc33',
            }),
        }),
    }),
});

vector.setMap(map);

function addInteraction(intType) {
    draw = new Draw({
        source: source,
        type: intType,
        style: new Style({
            fill: new Fill({
                color: 'rgba(255, 255, 255, 0.6)',
            }),
            stroke: new Stroke({
                color: 'rgba(0, 0, 0, 0.5)',
                lineDash: [10, 10],
                width: 2,
            }),
            image: new Circle({
                radius: 5,
                stroke: new Stroke({
                    color: 'rgba(0, 0, 0, 0.7)',
                }),
                fill: new Fill({
                    color: 'rgba(255, 255, 255, 0.2)',
                }),
            }),
        }),
    });

    map.addInteraction(draw);

    createMeasureTooltip();
    createHelpTooltip();

    var sketch;

    var pointerMoveHandler = function (evt) {
        if (evt.dragging) {
            return;
        }
        /** @type {string}*/
        var helpMsg = 'Click to start drawing';

        if (sketch) {
            var geom = sketch.getGeometry();
            if (geom instanceof Polygon) {
                helpMsg = continuePolygonMsg;
            } else if (geom instanceof LineString) {
                helpMsg = continueLineMsg;
            }
        }

        helpTooltipElement.innerHTML = helpMsg;
        helpTooltip.setPosition(evt.coordinate);

        helpTooltipElement.classList.remove('hidden');
    };

    pointerMoveKey = map.on('pointermove', pointerMoveHandler);

    //listener

    let listener;

    draw.on('drawstart', function (evt) {
        sketch = evt.feature;

        /** @type {import("ol/coordinate.js").Coordinate|undefined} */
        var tooltipCoord = evt.coordinate;

        listener = sketch.getGeometry().on('change', function (evt) {
            var geom = evt.target;
            var output;
            if (geom instanceof Polygon) {
                output = formatArea(geom);
                tooltipCoord = geom.getInteriorPoint().getCoordinates();
            } else if (geom instanceof LineString) {
                output = formatLength(geom);
                tooltipCoord = geom.getLastCoordinate();
            }
            measureTooltipElement.innerHTML = output;
            measureTooltip.setPosition(tooltipCoord);
        });
    });

    draw.on('drawend', function () {
        measureTooltipElement.className = 'meas-tooltip meas-tooltip-static';
        measureTooltip.setOffset([0, -7]);
        sketch = null;
        measureTooltipElement = null;
        createMeasureTooltip();
        unByKey(listener);
    });
}

var helpTooltipElement;
var helpTooltip;

function createHelpTooltip() {
    if (helpTooltipElement) {
        helpTooltipElement.parentNode.removeChild(helpTooltipElement);
    }
    helpTooltipElement = document.createElement('div');
    helpTooltipElement.className = 'meas-tooltip hidden';
    helpTooltip = new Overlay({
        element: helpTooltipElement,
        offset: [15, 10],
        positioning: 'center-left',
    });
    map.addOverlay(helpTooltip);
}

map.getViewport().addEventListener('mouseout', function () {
    if (helpTooltipElement) helpTooltipElement.classList.add('hidden');
});

var measureTooltipElement;
var measureTooltip;

function createMeasureTooltip() {
    if (measureTooltipElement) {
        measureTooltipElement.parentNode.removeChild(measureTooltipElement);
    }
    measureTooltipElement = document.createElement('div');
    measureTooltipElement.className = 'meas-tooltip meas-tooltip-measure';
    measureTooltip = new Overlay({
        element: measureTooltipElement,
        offset: [0, -15],
        positioning: 'center-left',
    });
    map.addOverlay(measureTooltip);
}

const formatLength = function (line) {
    const length = getLength(line);
    var output;
    if (length > 100) {
        output = Math.round((length / 1000) * 100) / 100 + ' ' + 'km';
    } else {
        output = Math.round(length * 100) / 100 + ' ' + 'm';
    }
    return output;
};

const formatArea = function (polygon) {
    const area = getArea(polygon);
    var output;
    if (area > 10000) {
        output = Math.round((area / 1000000) * 100) / 100 + ' ' + 'km<sup>2</sup>';
    } else {
        output = Math.round(area * 100) / 100 + ' ' + 'm<sup>2</sup>';
    }
    return output;
};

window.addEventListener('load', () => {
    document.querySelector('nav.navbar').classList.remove('navbar-transparent');
});

var note = new Notification();
map.addControl(note);

var legend = new Legend({
    title: 'Legenda',
    // margin: 5,
    // maxWidth: 300,
});

var legendControl = new LegendControl({
    legend: legend,
    collapsed: false,
});
map.addControl(legendControl);

// New legend associated with a layer
var layerLegend = new Legend({ layer: lokasi });
var jenisTanahLegend = new Legend({ layer: jenisTanah });
var lerengLegend = new Legend({ layer: lereng });
var tutupLahanLegend = new Legend({ layer: penutupLahan });
var sungaiLegend = new Legend({ layer: sungai });
var ujiPetakLegend = new Legend({ layer: ujiPetak });
var jlnAspalLegend = new Legend({ layer: jlnAspal });
var jlnBatuLegend = new Legend({ layer: jlnBatu });
var poinLegend = new Legend({ layer: poin });
var gorongLegend = new Legend({ layer: gorong });
var bangunanLegend = new Legend({ layer: bangunan });
var permukimanLegend = new Legend({ layer: permukiman });

layerLegend.addItem({
    title: 'Batas Lokasi Wanagama',
    typeGeom: 'Polygon',
    style: lokasi.getStyle(),
});
jenisTanahLegend.addItem({
    title: 'Medit Merah & Rendzina',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(170, 87, 9, 1' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
jenisTanahLegend.addItem({
    title: 'Rendzina',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(120, 30, 15, 1' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});

lerengLegend.addItem({
    title: 'Datar',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(16, 176, 70, 1' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
lerengLegend.addItem({
    title: 'Landai',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(126, 241, 10, 1' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
lerengLegend.addItem({
    title: 'Berombak',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(243, 239, 9, 1' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
lerengLegend.addItem({
    title: 'Lereng',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(248, 161, 3, 1' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
lerengLegend.addItem({
    title: 'Curam',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(249, 72, 8, 1' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});

tutupLahanLegend.addItem({
    title: 'Bangunan',
    typeGeom: 'Polygon',
    style: new Style({ fill: new Fill({ color: 'black' }), stroke: new Stroke({ color: 'white' }) }),
});
tutupLahanLegend.addItem({
    title: 'Agroforestri',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(172, 235, 17, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Akasia',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(38, 111, 2, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Bambu',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(78, 130, 52, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Belukar',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(77, 154, 61, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Cemara Udang',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(128, 231, 8, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Danau',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(91, 255, 237, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Duwet',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(148, 76, 126, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Eucalyptus',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(237, 160, 128, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Gliriside',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(163, 122, 104, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Gmelina',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(121, 35, 35, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Jabon',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(204, 109, 151, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Jalan',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(245, 30, 0, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Jati',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(175, 84, 0, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Kayuputih',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(152, 187, 110, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Lahan Terbuka',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(255, 255, 255, 1)' }),
        stroke: new Stroke({ color: 'black' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Leda',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(112, 95, 175, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Mahoni',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(176, 202, 19, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Salam',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(8, 142, 52, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Sungai',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(11, 228, 245, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Tegakan Campur',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(196, 253, 9, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});
tutupLahanLegend.addItem({
    title: 'Trembesi',
    typeGeom: 'Polygon',
    style: new Style({
        fill: new Fill({ color: 'rgba(179, 161, 9, 1)' }),
        stroke: new Stroke({ color: 'white' }),
    }),
});

sungaiLegend.addItem({
    title: 'Sungai',
    typeGeom: 'LineString',
    style: sungai.getStyle(''),
});

ujiPetakLegend.addItem({
    title: 'Petak Uji',
    typeGeom: 'LineString',
    style: ujiPetak.getStyle(''),
});

jlnAspalLegend.addItem({
    title: 'Jalan Aspal',
    typeGeom: 'LineString',
    style: jlnAspal.getStyle(''),
});

jlnBatuLegend.addItem({
    title: 'Jalan Batu',
    typeGeom: 'LineString',
    style: jlnBatu.getStyle(''),
});

poinLegend.addItem({
    title: 'Keterangan',
    typeGeom: 'Point',
    style: poin.getStyle(''),
});

bangunanLegend.addItem({
    title: 'Bangunan',
    typeGeom: 'Point',
    style: bangunan.getStyle(''),
});

gorongLegend.addItem({
    title: 'Gorong-gorong',
    typeGeom: 'Point',
    style: gorong.getStyle(''),
});

permukimanLegend.addItem({
    title: 'Permukiman',
    typeGeom: 'Polygon',
    style: permukiman.getStyle(''),
});

legend.addItem(poinLegend);
legend.addItem(bangunanLegend);
legend.addItem(gorongLegend);
legend.addItem(ujiPetakLegend);
legend.addItem(jlnAspalLegend);
legend.addItem(jlnBatuLegend);
legend.addItem(sungaiLegend);
legend.addItem(layerLegend);
legend.addItem(permukimanLegend);
legend.addItem(jenisTanahLegend);
legend.addItem(lerengLegend);
legend.addItem(tutupLahanLegend);

// Table Attribute
const attributeTableEl = document.querySelector('.attribute-table');
attributeTableEl.querySelector('.ol-close').addEventListener('click', () => {
    attributeTableEl.classList.remove('active');
});

function showAttributeTable(source) {
    const tableEl = attributeTableEl.querySelector('table');
    const theadEl = attributeTableEl.querySelector('table');
    const tbodyEl = attributeTableEl.querySelector('table');
    theadEl.innerHTML = '';
    tbodyEl.innerHTML = '';

    const headings = new Set();
    const data = [];
    source.getFeatures().forEach(feature => {
        const { geometry, ...props } = feature.getProperties();
        Object.keys(props).forEach(key => headings.add(key));
        data.push(props);
    });

    const headingsArray = Array.from(headings);
    const headingsTrEl = document.createElement('tr');
    theadEl.append(headingsTrEl);
    headingsArray.forEach(key => {
        const thEl = document.createElement('th');
        thEl.innerHTML = key;
        headingsTrEl.append(thEl);
    });

    data.forEach(item => {
        const trEl = document.createElement('tr');
        tbodyEl.append(trEl);
        headingsArray.forEach(key => {
            const thEl = document.createElement('td');
            thEl.innerHTML = item[key] ?? '-';
            trEl.append(thEl);
        });
    });

    attributeTableEl.classList.add('active');
}

const taButton = document.querySelector('#taButton');
const taEl = document.querySelector('.taButtonDiv');

const taControl = new Control({
    element: taEl,
});

const taSelect = document.querySelector('#ta-value');

taButton.addEventListener(
    'click',
    () => {
        showAttributeTable(lokasi.getSource());
    },
    2000,
);

taSelect.addEventListener('change', () => {
    let source;
    switch (taSelect.value) {
        case '1':
            source = lokasi.getSource();
            break;

        case '2':
            source = jenisTanah.getSource();
            break;

        default:
            source = lokasi.getSource();
            break;
    }

    source.once('featuresloadend', () => {
        showAttributeTable(source);
    });
    source.loadFeatures(createEmpty(), Infinity, mapView.getProjection());
    showAttributeTable(source);
});

map.addControl(taControl);

// START DOWNLOAD MAP
var downloadButton = document.querySelector('#downloadButton');
var downloadElement = document.querySelector('.downloadButtonDiv');

var downloadControl = new Control({
    element: downloadElement,
});

downloadButton.addEventListener('click', () => {
    map.once('rendercomplete', function () {
        const mapCanvas = document.createElement('canvas');
        const size = map.getSize();
        mapCanvas.width = size[0];
        mapCanvas.height = size[1];
        const mapContext = mapCanvas.getContext('2d');
        Array.prototype.forEach.call(
            map.getViewport().querySelectorAll('.ol-layer canvas, canvas.ol-layer'),
            function (canvas) {
                if (canvas.width > 0) {
                    const opacity = canvas.parentNode.style.opacity || canvas.style.opacity;
                    mapContext.globalAlpha = opacity === '' ? 1 : Number(opacity);
                    let matrix;
                    const transform = canvas.style.transform;
                    if (transform) {
                        // Get the transform parameters from the style's transform matrix
                        matrix = transform
                            .match(/^matrix\(([^\(]*)\)$/)[1]
                            .split(',')
                            .map(Number);
                    } else {
                        matrix = [
                            parseFloat(canvas.style.width) / canvas.width,
                            0,
                            0,
                            parseFloat(canvas.style.height) / canvas.height,
                            0,
                            0,
                        ];
                    }
                    // Apply the transform to the export map context
                    CanvasRenderingContext2D.prototype.setTransform.apply(mapContext, matrix);
                    const backgroundColor = canvas.parentNode.style.backgroundColor;
                    if (backgroundColor) {
                        mapContext.fillStyle = backgroundColor;
                        mapContext.fillRect(0, 0, canvas.width, canvas.height);
                    }
                    mapContext.drawImage(canvas, 0, 0);
                }
            },
        );
        mapContext.globalAlpha = 1;
        mapContext.setTransform(1, 0, 0, 1, 0, 0);
        let scaleEl = map.getTargetElement().querySelector('.ol-scale-line');
        if (!scaleEl) scaleEl = map.getTargetElement().querySelector('.ol-scale-bar');
        const legendEl = map.getTargetElement().querySelector('.ol-legend');
        const promises = [];
        const [mapWidth, mapHeight] = map.getSize();

        [scaleEl, legendEl].forEach(el => {
            if (!el) return;
            const containerEl = document.createElement('div');
            containerEl.style.position = 'relative';
            containerEl.style.height = `${mapHeight}px`;
            containerEl.style.width = `${mapWidth}px`;
            const parentEl = el.parentElement;
            containerEl.append(el);
            parentEl.append(containerEl);
            const closeBoxEl = el.querySelector('.ol-closebox');
            if (closeBoxEl) closeBoxEl.style.display = 'none';

            const promise = html2canvas(containerEl, {
                backgroundColor: 'transparent',
            })
                .then(canvas => {
                    mapContext.drawImage(canvas, 0, 0);
                })
                .finally(() => {
                    if (closeBoxEl) closeBoxEl.style.display = '';
                    parentEl.append(el);
                    containerEl.remove();
                });
            promises.push(promise);
        });
        Promise.all(promises)
            .then(() => {
                const link = document.getElementById('image-download');
                link.download = 'map.png';
                link.href = mapCanvas.toDataURL();
                link.click();
            })
            .catch(console.error);
    });
    map.renderSync();
});

map.addControl(downloadControl);

// var exportButton = document.querySelector('#exportButton');
var exportLokasiButton = document.querySelector('#batasLokasiExport');
var exportTanahButton = document.querySelector('#jenisTanahExport');
var exportlerengButton = document.querySelector('#lerengExport');
var exportlahanButton = document.querySelector('#lahanExport');
var exportpoinButton = document.querySelector('#poinKeteranganExport');
var exportbangunanButton = document.querySelector('#bangunanExport');
var exportgorongButton = document.querySelector('#gorongExport');
var exportjalanBatuButton = document.querySelector('#jalanBatuExport');
var exportpetakUjiButton = document.querySelector('#petakUjiExport');
var exportElement = document.querySelector('.exportButtonDiv');

var exportControl = new Control({
    element: exportElement,
});

exportLokasiButton.addEventListener('click', event => {
    const exportSource = lokasi.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'lokasi.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});

exportTanahButton.addEventListener('click', event => {
    const exportSource = jenisTanah.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'jenisTanah.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});

exportlerengButton.addEventListener('click', event => {
    const exportSource = lereng.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'lereng.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});

exportlahanButton.addEventListener('click', event => {
    const exportSource = penutupLahan.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'tutupanLahan.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});

exportpoinButton.addEventListener('click', event => {
    const exportSource = poin.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'poinKeterangan.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});
exportbangunanButton.addEventListener('click', event => {
    const exportSource = bangunan.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'bangunan.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});
exportgorongButton.addEventListener('click', event => {
    const exportSource = gorong.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'gorong.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});
exportjalanBatuButton.addEventListener('click', event => {
    const exportSource = jlnBatu.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'jlnBatu.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});
exportpetakUjiButton.addEventListener('click', event => {
    const exportSource = ujiPetak.getSource();
    exportSource.loadFeatures(createEmpty(), Infinity);
    const json = new GeoJSON().writeFeatures(exportSource.getFeatures());
    const link = document.getElementById('image-download');
    link.download = 'petakUji.geojson';
    link.href = `data:application/json;base64,${btoa(json)}`;
    link.click();
});

map.addControl(exportControl);

var note = new Notification();
map.addControl(note);

// Add the editbar
var select = new Select({ title: 'Select' });
select.set('title', 'Select');
var edit = new EditBar({
    // Translate interaction title / label
    interactions: {
        // Use our own interaction > set the title inside
        Select: select,
        // Define button title
        DrawLine: 'Line',
        // Drawregular with label
        DrawRegular: { title: 'Regular Form', ptsLabel: 'pts', circleLabel: 'Cirlce' },
    },
    source: vector.getSource(),
});

edit.getInteraction('Select').on('select', function (e) {
    if (this.getFeatures().getLength()) {
        tooltip.setInfo('Drag points on features to edit...');
    } else tooltip.setInfo();
});
edit.getInteraction('Select').on('change:active', function (e) {
    tooltip.setInfo('');
});
edit.getInteraction('ModifySelect').on('modifystart', function (e) {
    if (e.features.length === 1) tooltip.setFeature(e.features[0]);
});
edit.getInteraction('ModifySelect').on('modifyend', function (e) {
    tooltip.setFeature();
});
edit.getInteraction('DrawPoint').on('change:active', function (e) {
    tooltip.setInfo(e.oldValue ? '' : 'Click map to place a point...');
});
edit.getInteraction('DrawLine').on(['change:active', 'drawend'], function (e) {
    tooltip.setFeature();
    tooltip.setInfo(e.oldValue ? '' : 'Click map to start drawing line...');
});
edit.getInteraction('DrawLine').on('drawstart', function (e) {
    tooltip.setFeature(e.feature);
    tooltip.setInfo('Click to continue drawing line...');
});
edit.getInteraction('DrawPolygon').on('drawstart', function (e) {
    tooltip.setFeature(e.feature);
    tooltip.setInfo('Click to continue drawing shape...');
});
edit.getInteraction('DrawPolygon').on(['change:active', 'drawend'], function (e) {
    tooltip.setFeature();
    tooltip.setInfo(e.oldValue ? '' : 'Click map to start drawing shape...');
});
edit.getInteraction('DrawHole').on('drawstart', function (e) {
    tooltip.setFeature(e.feature);
    tooltip.setInfo('Click to continue drawing hole...');
});
edit.getInteraction('DrawHole').on(['change:active', 'drawend'], function (e) {
    tooltip.setFeature();
    tooltip.setInfo(e.oldValue ? '' : 'Click polygon to start drawing hole...');
});
edit.getInteraction('DrawRegular').on('drawstart', function (e) {
    tooltip.setFeature(e.feature);
    tooltip.setInfo('Move and click map to finish drawing...');
});
edit.getInteraction('DrawRegular').on(['change:active', 'drawend'], function (e) {
    tooltip.setFeature();
    tooltip.setInfo(e.oldValue ? '' : 'Click map to start drawing shape...');
});
var save = new Button({
    html: '<i class="fa fa-download"></i>',
    title: 'Save',
    handleClick: function (e) {
        var json = new GeoJSON().writeFeatures(vector.getSource().getFeatures());
        info(json);
    },
});
edit.addControl(save);

edit.on('info', function (e) {
    console.log(e);
    note.show('<i class="fa fa-info-circle"></i> ' + e.features.getLength() + ' feature(s) selected');
});

const editingSwitch = document.querySelector('#editSwitch');
var tooltip = new Tooltip();
editingSwitch.addEventListener('click', event => {
    if (editingSwitch.checked) {
        map.addControl(edit);
        map.addOverlay(tooltip);
        map.removeOverlay(popup);
    } else {
        map.removeControl(edit);
        map.removeOverlay(tooltip);
        map.addOverlay(popup);
    }
});
