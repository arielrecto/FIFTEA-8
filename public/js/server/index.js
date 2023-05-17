const server = () => {
    return axios.create({
        baseURL: "http://127.0.0.1:8000/",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
};


export default server;
