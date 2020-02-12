import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { TableComponent } from './table/table.component';
import { FormsComponent } from './forms/forms.component';

@NgModule({
  declarations: [
    AppComponent,
    TableComponent,
    FormsComponent
  ],
  imports: [
    BrowserModule,
	HttpClientModule,
	RouterModule.forRoot([
		{
			path: "tabela",
			component: TableComponent
		},
		{
			path: "formulario",
			component: FormsComponent
		}
	])
  ],
  providers: [],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
