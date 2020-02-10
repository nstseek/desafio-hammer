/* tslint:disable */
import { Injectable } from '@angular/core';
import { HttpClient, HttpRequest, HttpResponse, HttpHeaders } from '@angular/common/http';
import { BaseService as __BaseService } from '../base-service';
import { ApiConfiguration as __Configuration } from '../api-configuration';
import { StrictHttpResponse as __StrictHttpResponse } from '../strict-http-response';
import { Observable as __Observable } from 'rxjs';
import { map as __map, filter as __filter } from 'rxjs/operators';


/**
 * Permite baixar arquivo
 */
@Injectable({
  providedIn: 'root',
})
class ArquivoService extends __BaseService {
  static readonly getArquivoNomePath = '/arquivo/{nome}';

  constructor(
    config: __Configuration,
    http: HttpClient
  ) {
    super(config, http);
  }

  /**
   * @param nome Nome do arquivo
   */
  getArquivoNomeResponse(nome: string): __Observable<__StrictHttpResponse<null>> {
    let __params = this.newParams();
    let __headers = new HttpHeaders();
    let __body: any = null;

    let req = new HttpRequest<any>(
      'GET',
      this.rootUrl + `/arquivo/${nome}`,
      __body,
      {
        headers: __headers,
        params: __params,
        responseType: 'json'
      });

    return this.http.request<any>(req).pipe(
      __filter(_r => _r instanceof HttpResponse),
      __map((_r) => {
        return _r as __StrictHttpResponse<null>;
      })
    );
  }
  /**
   * @param nome Nome do arquivo
   */
  getArquivoNome(nome: string): __Observable<null> {
    return this.getArquivoNomeResponse(nome).pipe(
      __map(_r => _r.body as null)
    );
  }
}

module ArquivoService {
}

export { ArquivoService }
