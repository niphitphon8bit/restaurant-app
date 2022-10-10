<script>
import { defineComponent } from "vue";
import { GoogleMap, Marker } from "vue3-google-map";

export default defineComponent({
  
    props: {msg:{}},
    components: { GoogleMap, Marker },
    setup(props) {
        const center = { lat: props.msg.geometry.location.lat, lng: props.msg.geometry.location.lng };
        const API_KEY = import.meta.env.VITE_GOOGLE_MAP_API_KEY;
        // console.log(API_KEY)
        // console.log(props.msg)
        return { center,API_KEY };
  },
});
</script>

<template>
  <GoogleMap :api-key=API_KEY style="width: 100%; height: 500px" :center="center" :zoom="15">
    <Marker :options="{ position: center }" />
  </GoogleMap>
</template>
