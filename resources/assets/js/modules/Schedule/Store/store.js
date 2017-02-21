import Vuex from 'vuex'

import getters from './getters'
import mutations from './mutations'
import actions from './actions'

export const store = new Vuex.Store({
    state: {
        header: {
            title: 'Schedule'
        },
        date: window.Moment().format("MM/DD/YYYY"),
        teams: [
            {
                id: 1,
                name: 'Carro #01',
                color: 'tag-danger',
                members: [
                    {
                        id: 6,
                        name: 'Ema'
                    },
                    {
                        id: 19,
                        name: 'Mirian'
                    }
                ],
                schedules: [
                    {
                        client: 'Celeste Fuertes',
                        hour: '08:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Chaves de baixo do tapete'
                    },
                    {
                        client: 'Toleda Baldino',
                        hour: '10:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Limpar geladeira'
                    },
                    {
                        client: 'Tamara Bowman',
                        hour: '13:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Nunca entrar nos quartos e limpar banheira'
                    },
                    {
                        client: 'Flower Hill School',
                        hour: '15:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Pegar chave com guarda'
                    }
                ]
            },
            {
                id: 2,
                name: 'Carro #02',
                color: 'tag-primary',
                members: [
                    {
                        id: 6,
                        name: 'Ema'
                    },
                    {
                        id: 19,
                        name: 'Mirian'
                    }
                ],
                schedules: [
                    {
                        client: 'Celeste Fuertes',
                        hour: '08:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Chaves de baixo do tapete'
                    },
                    {
                        client: 'Toleda Baldino',
                        hour: '10:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Limpar geladeira'
                    },
                    {
                        client: 'Tamara Bowman',
                        hour: '13:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Nunca entrar nos quartos e limpar banheira'
                    },
                    {
                        client: 'Flower Hill School',
                        hour: '15:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Pegar chave com guarda'
                    }
                ]
            },
            {
                id: 3,
                name: 'Carro #03',
                color: 'tag-default',
                members: [
                    {
                        id: 6,
                        name: 'Ema'
                    },
                    {
                        id: 19,
                        name: 'Mirian'
                    }
                ],
                schedules: [
                    {
                        client: 'Celeste Fuertes',
                        hour: '08:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Chaves de baixo do tapete'
                    },
                    {
                        client: 'Toleda Baldino',
                        hour: '10:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Limpar geladeira'
                    },
                    {
                        client: 'Tamara Bowman',
                        hour: '13:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Nunca entrar nos quartos e limpar banheira'
                    },
                    {
                        client: 'Flower Hill School',
                        hour: '15:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Pegar chave com guarda'
                    }
                ]
            },
            {
                id: 4,
                name: 'Carro #04',
                color: 'tag-info',
                members: [
                    {
                        id: 6,
                        name: 'Ema'
                    },
                    {
                        id: 19,
                        name: 'Mirian'
                    }
                ],
                schedules: [
                    {
                        client: 'Celeste Fuertes',
                        hour: '08:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Chaves de baixo do tapete'
                    },
                    {
                        client: 'Toleda Baldino',
                        hour: '10:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Limpar geladeira'
                    },
                    {
                        client: 'Tamara Bowman',
                        hour: '13:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Nunca entrar nos quartos e limpar banheira'
                    },
                    {
                        client: 'Flower Hill School',
                        hour: '15:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Pegar chave com guarda'
                    }
                ]
            },
            {
                id: 5,
                name: 'Carro #05',
                color: 'tag-warning',
                members: [
                    {
                        id: 6,
                        name: 'Ema'
                    },
                    {
                        id: 19,
                        name: 'Mirian'
                    }
                ],
                schedules: [
                    {
                        client: 'Celeste Fuertes',
                        hour: '08:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Chaves de baixo do tapete'
                    },
                    {
                        client: 'Toleda Baldino',
                        hour: '10:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Limpar geladeira'
                    },
                    {
                        client: 'Tamara Bowman',
                        hour: '13:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Nunca entrar nos quartos e limpar banheira'
                    },
                    {
                        client: 'Flower Hill School',
                        hour: '15:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Pegar chave com guarda'
                    }
                ]
            },
            {
                id: 6,
                name: 'Carro #06',
                color: 'tag-dark',
                members: [
                    {
                        id: 6,
                        name: 'Ema'
                    },
                    {
                        id: 19,
                        name: 'Mirian'
                    }
                ],
                schedules: [
                    {
                        client: 'Celeste Fuertes',
                        hour: '08:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Chaves de baixo do tapete'
                    },
                    {
                        client: 'Toleda Baldino',
                        hour: '10:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Limpar geladeira'
                    },
                    {
                        client: 'Tamara Bowman',
                        hour: '13:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Nunca entrar nos quartos e limpar banheira'
                    },
                    {
                        client: 'Flower Hill School',
                        hour: '15:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Pegar chave com guarda'
                    }
                ]
            },
            {
                id: 7,
                name: 'Carro #07',
                color: 'tag-success',
                members: [
                    {
                        id: 6,
                        name: 'Ema'
                    },
                    {
                        id: 19,
                        name: 'Mirian'
                    }
                ],
                schedules: [
                    {
                        client: 'Celeste Fuertes',
                        hour: '08:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Chaves de baixo do tapete'
                    },
                    {
                        client: 'Toleda Baldino',
                        hour: '10:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Limpar geladeira'
                    },
                    {
                        client: 'Tamara Bowman',
                        hour: '13:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Nunca entrar nos quartos e limpar banheira'
                    },
                    {
                        client: 'Flower Hill School',
                        hour: '15:00',
                        address: '5108 Donovan Dr, Alexandria, VA 22304',
                        comment: 'Pegar chave com guarda'
                    }
                ]
            }
        ]
    },
    mutations,
    getters,
    actions
});