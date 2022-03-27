import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCompanies() {
    const truck = ref([])
    const fleet = ref([])

    const errors = ref('')
    const router = useRouter()

    const getFleet = async () => {
        response = await axios.get(`/api/fleet`);
        fleet.value = response.data.data;
    }

    const getTruck = async(id) => {
        response = await axios.get(`/api/fleet/${id}`);
        truck.value = response.data.data;
    }

    const saveTruck = async(data) => {
        errors.value = '';
        try {
            
        } catch (e) {
            
        }
    }

    const editTruck = async(id) => {

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
        editTruck,

    }

}