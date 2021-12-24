function axiosGet(url) {
    const promise = axios.get(url);
    const dataPromise = promise.then((response) => response.data);
    return dataPromise;
}
function axiosPost(url, formObj) {
    const promise = axios.post(url, formObj);
    const dataPromise = promise.then((response) => response.data);
    return dataPromise;
}