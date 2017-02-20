import Auth from './auth';
import appConfig from './appConfig';

//interceptor para adicionar o token no header da requesição
Vue.http.interceptors.push((request, next)=>{
    request.headers.set('Authorization', Auth.getAuthorizationHeader()); // configurar a requesiçao
    next(); // passa para o proximo interceptor, até não haver mais interceptors
});

// interceptor para o refresh token, verifica se esta expirado
Vue.http.interceptors.push((request, next) =>{
    next((response) => {
        if(response.status === 401 || response.status === 0){  // se token esta expirado
            return Auth.refreshToken()
                .then(() =>{  //tenta fazer um refresh ao token
                    return Vue.http(request);  // caso o refresh tenha sido feito com sucesso, retorna a RESPONSE ORIGINAL para que faça o que o utilizador pediu
                })
                .catch(() => {
                    Auth.clearAuth(); // limpa o token do localstorage metodo do auth.js
                    window.location.href = appConfig.login_url
                }); // redireciona para o login, caso o token tenha expirado (2 semanas)

        }
    });
});

