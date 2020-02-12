import { Component, OnInit } from "@angular/core";
import { ApiService } from "../api.service";

@Component({
	selector: "app-forms",
	templateUrl: "./forms.component.html",
	styleUrls: [ "./forms.component.scss" ]
})

export class FormsComponent implements OnInit {
	formData;

	constructor(private apiService: ApiService) { }

	ngOnInit() {
		this.apiService.getForms().subscribe((data) => {
			this.formData = data;
		});
	}
}
