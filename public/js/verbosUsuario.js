export default{

    get () {
        return fetch("http://localhost:8000/api/usuario", {
            method: "GET",
            headers: {
                "Content-type": "application/json",
            }
        });
    },
    post(usuario){
        return fetch("http://localhost:8000/api/usuario", {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(usuario),
        });
    },
    put(id, usuario){
        return fetch("http://localhost:8000/api/usuario/"+id, {
            method: "PUT",
            headers: {
                "Content-type": "application/json",
                'Access-Control-Allow-Origin': '*',
            },
            body: JSON.stringify(usuario),
        });
    },
    delete(id){
        return fetch("http://localhost:8000/api/usuario/"+id, {
            method: "DELETE",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(usuario),
        });
    }
}