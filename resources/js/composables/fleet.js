import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useFleet() {
    const truck = ref([])
    const fleet = ref([])

    const errors = ref('')
    const router = useRouter()

    const getFleet = async () => {
        let response = await axios.get(`/api/fleet`);
        fleet.value = response.data.data;
    }

    const getTruck = async(id) => {
        let response = await axios.get(`/api/fleet/${id}`);
        truck.value = response.data.data;
    }

    const saveTruck = async(data) => {
        errors.value = '';
        try {
            
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateTruck = async(id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/fleet/${id}`, truck.value);
            // await router.push({name: 'fleet.list'});
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }

    }

    const destroyTruck = async(id) => {
        await axios.delete(`/api/fleet/${id}`);
        await router.push('fleet.list');9
    }


    return {
        truck,
        fleet,
        errors,
        getTruck,
        getFleet,
        saveTruck,
        updateTruck,
        destroyTruck,

    }

}