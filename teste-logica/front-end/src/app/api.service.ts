import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";

@Injectable({
	providedIn: "root"
})

export class ApiService {

	constructor(private httpClient: HttpClient) { }

	apiURL = "https://alcos.me/TesteHammer/ci/api/v1/";

	public getTable() {
		return this.httpClient.get(`${this.apiURL}tabela`);
	}

	public getForms() {
		return this.httpClient.get(`${this.apiURL}formulario`);
	}

	public sendForms(data) {
		return this.httpClient.post(`${this.apiURL}formulario`, data);
	}
}
