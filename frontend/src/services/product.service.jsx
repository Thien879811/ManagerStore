import createApiClient from "./api.service";
class ProductService {
    constructor(baseUrl = "/api/product") {
        this.api = createApiClient(baseUrl);
    }
    async getAll() {
        return (await this.api.get("/")).data;
    }
    async create(data) {
        const headers = { 'Content-Type': 'multipart/form-data' };
        return (await this.api.post("/", data, { headers })).data;
    }
    async deleteAll() {
        return (await this.api.delete("/")).data;
    }
    async get(id) {
        return (await this.api.get(`/${id}`)).data;
    }
    async update(id, data) {
        const headers = { 'Content-Type': 'multipart/form-data' };
        return (await this.api.post(`/${id}`, data, { headers })).data;
    }
    async delete(id) {
        return (await this.api.delete(`/${id}`)).data;
    }
}
export default new ProductService();
