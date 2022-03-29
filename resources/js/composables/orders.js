import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useOrders() {
    const order = ref([])
    const orders = ref([])

    const errors = ref('')
    const router = useRouter()

    const getOrders = async () => {
        let response = await axios.get(`/api/orders`);
        orders.value = response.data.data;
    }

    const getOrder = async(id) => {
        let response = await axios.get(`/api/orders/${id}`);
        order.value = response.data.data;
    }

    const saveOrder = async(data) => {
        errors.value = '';
        try {
            await axios.post(`/api/orders`, data);
            await router.push({name: 'orders.list'});
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateOrder = async(id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/orders/${id}`, order.value);
            await router.push({name: 'orders.list'})
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }

    }

    const dispatchOrder = async(data) => {
        errors.value = ''
        try {
            
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const destroyOrder = async(id) => {
        await axios.delete(`/api/orders/${id}`);
        await router.push('orders.list');
    }


    return {
        order,
        orders,
        errors,
        getOrder,
        getOrders,
        saveOrder,
        updateOrder,
        dispatchOrder,
        destroyOrder,

    }

}