import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useFleetStatus(){
    const status = ref([])
    const statuses = ref([])

    const errors = ref('')
    const router = useRouter()

    const getStatuses = async () => {
        let response = await axios.get(`/api/fleet-status`);
        statuses.value = response.data.data;
    }

    const getStatus = async(id) => {
        let response = await axios.get(`/api/fleet-status/${id}`);
        status.value = response.data.data;
    }

    return {
        errors,
        status,
        statuses,
        getStatus,
        getStatuses,
    }
};