<script>
import { defineComponent } from "vue";
import { GoogleMap, Marker } from "vue3-google-map";

export default defineComponent({
    props: {msg:{}},
    components: { GoogleMap, Marker },
    setup(props) {
        const center = { lat: props.msg.geometry.location.lat, lng: props.msg.geometry.location.lng };
        console.log(props.msg)
        return { center };
  },
});
</script>

<template>
  <GoogleMap api-key="AIzaSyDHuyYfChBZWMDC7v-K4l3ubWVxlSV5GxY" style="width: 100%; height: 500px" :center="center" :zoom="15">
    <Marker :options="{ position: center }" />
  </GoogleMap>
</template>
