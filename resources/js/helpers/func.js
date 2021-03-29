export function convertFormData(data, isPutRequest = false) {
    let formData = new FormData();

    if (isPutRequest) formData.set('_method', 'PUT');
    
    for (const property in data) {
        if (data.hasOwnProperty(property)) {
            const value = data[property];
            formData.append(property, value);
        }
    }

    return formData;
}