/* tslint:disable */
import { Injectable } from '@angular/core';

/**
 * Global configuration for Api services
 */
@Injectable({
  providedIn: 'root',
})
export class ApiConfiguration {
  rootUrl: string = 'https://alcos.me/TesteHammer/ci/api/v1';
}

export interface ApiConfigurationInterface {
  rootUrl?: string;
}
