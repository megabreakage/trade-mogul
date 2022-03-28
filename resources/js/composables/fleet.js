import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCompanies() {
    const truck = ref([])
    const fleet = ref([])

    const errors = ref('')
    const router = useRouter()

    const getFleet = async () => {
        let response = await axios.get(`/api/fleet`);
        fleet.value = response.data.data;
        // console.log(fleet.value);
    }

    const getTruck = async(id) => {
        let response = await axios.get(`/api/fleet/${id}`);
        truck.value = response.data.data;
    }

    const saveTruck = async(data) => {
        errors.value = '';
        try {
            
        } catch (e) {
            
        }
    }

    const editTruck = async(id) => {
        errors.value = ''
        try {
            
        } catch (e) {
            
        }

    }

    const assignTruck = async(data) => {
        errors.value = ''
        try {
            
        } catch (e) {
            
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
        editTruck,
        destroyTruck,

    }

}