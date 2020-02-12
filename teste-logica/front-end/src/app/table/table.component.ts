import { Component, OnInit } from "@angular/core";
import { ApiService } from "../api.service";

@Component({
	selector: "app-table",
	templateUrl: "./table.component.html",
	styleUrls: ["./table.component.scss"]
})

export class TableComponent implements OnInit {
	tableRows;
	tableHeaders;

	constructor(private apiService: ApiService) { }

	ngOnInit() {
		this.apiService.getTable().subscribe((data) => {
			this.tableRows = data;
			this.tableHeaders = this.getTableHeaders(data);
		});
	}

	getTableHeaders(data) {
		var ret = [];

		data.forEach(function(el, i) {
			Object.getOwnPropertyNames(el).forEach(function(el2) {
				if(!ret.includes(el2)) ret.push(el2); 
			});
		});

		return ret;
	}

	normalizeCamelCase(string) {
		var ret;

		for(var n = 0; n < string.length; n++) {
			if(n == 0) ret = string[n].toUpperCase();
			else if(string[n] == string[n].toUpperCase()) ret += " " + string[n].toLowerCase();
			else ret += string[n];
		}

		return ret;
	}
}
