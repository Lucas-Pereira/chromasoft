export default{

     index () {
        return fetch("http://localhost:8000/api/usuario", {
            method: "GET",
            headers: {
                "Content-type": "application/json",
            }
        });
    },
    criar(usuario){
        return fetch("http://localhost:8000/api/usuario", {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(usuario),
        });
    },
    atualizar(id,usuario){
        return fetch("http://localhost:8000/api/usuario/"+id, {
            method: "PUT",
            headers: {
                "Content-type": "application/json",
                'Access-Control-Allow-Origin': '*',
            },
            body: JSON.stringify(usuario),
        });
    },
    deletar(id){
        return fetch("http://localhost:8000/api/usuario/"+id, {
            method: "DELETE",
            headers: {
                "Content-type": "application/json",
                'Access-Control-Allow-Origin': '*'
            }
        });
    }
}