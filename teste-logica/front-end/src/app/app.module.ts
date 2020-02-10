import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { RouterModule, Routes } from '@angular/router';

const appRoutes: Routes = [ 
	{
		path: "tabela",
		component: TabelaComponent
	},
	{
		path: "formulario",
		component: Formulario
	}
];

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
	RouterModule.forRoot(
		appRoutes,
		{ enableTracing: true }
	)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
