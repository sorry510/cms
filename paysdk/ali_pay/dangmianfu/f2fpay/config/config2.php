<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
$arrpayconfig = laimi_config_pay();

$config = array (
		//签名方式,默认为RSA2(RSA2048)
		'sign_type' => $arrpayconfig['alipaysign_type'],

		//支付宝公钥
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAiMwklwhLN/ZEZ1No7PBF31LhJTSYn1C5PNf56yxaSa9YA5j38DtVi7pGLOIh2UGXl6BEJNBZca6brbPB/gTOQ0VJVdMVkfqeb6AOiL4q+Kg/fcBPzeScj30hjnRCpTV42q5YEUHRlVBFL5guiCHc6boOAFdQ4zhUQOICZx6PXaX0x+9Wk8654lVR7YHmhfSGczP2y+nPV0sGzc5zvXlfsLiIXq/r88K4ZNJ3TF4+zh/fqDqSexSIYHf2n0/BVkt81Sqx3xy3yvUA3pfKZImvAF101YwEFYagMtOtWqh70e0bTWXawWQcwN2BrY37PslHSiit6Yn7dNzd+24lVqU6FQIDAQAB",

		//商户私钥
		'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCnC1FQvZ8i0SIf1Rwp4//NpfitoS5BZCJoC82Kv+StDXuU5HzQGFQc1SGQKubLoeWUoLYu2Fd3nGb3nRasFd5IParME7BkTOTNCPBBJbvWsO6IVKwmm1wDk6+bkoYNuThr9j4VLJcvn97FvdC7XS9FeRIXvttvp3cBStvOE/aLZyUya5CwbZlriTJhfADl+tjmgd9rnH6TyDfaebqhVKBXLX16+iP6/YdwU06Ly3lyBb3ohJo8vjpoVwmB0wkPmIZuS7pUoQdOAMhrEgAEfOGSivgwGl6wy296Mwqy5PuTmD9+Vdq0lQLgNlm548L0wNMt8U7wqGvRsJdK7PpqEnkLAgMBAAECggEAXG5+yFakv/dJEqQxuVxYJ8s3F5ygo75s63XcfnJAbyGOyIzGI7/Si0HEGKokm3kyOFPVe4Zqn90DfPCHoyFWplK5N8ONT3LdCDdx+hqPHfU5iGaR+6rr9265NTSWyPE8r0DKiZzq64djFbg6z/J4PdEImesaMWZRC34IsreJLQk4hirx7m+zY2+9SO1GVup1h0XHNAg8tJQf75qMnS+Cp8Jc1lem+/qqCqLURCyChgLz8FfjsXclSoCk0iv1kCNqHQd78DvO3xTmxDwqIf3xUz4Cs1jWDRzy/C8QXV2wZjdfA2/JnwztL9/YoBfwT3YA01tehkg3wN4VLiXz1PE2wQKBgQDgW0DECCHD9xWQoEqKK2ELVGhxkOeZW6iLeS8udLU2fxl8+ZzYeuT2B8m5ecnhc5kAI5A+0y1wiC0d4+9lZx7uXSecfDqNLmXdZl0k7tkvRZfVwPoLHfVCMQ97bt8bYUPaC1Hz3uONESCIvunNZ7MWPWj0J/9uaKb7u1PDgE0e7wKBgQC+mrb4E6Sn241viz3ktk2WU4CBm5JiVVC30W631MZ+vq+APwgJdK0qwZ7EoQ0fr1JMHnChJivSDYcNT/LVNsjP6tcFkCu/5+T4u9VXHbb8yEuWpkbx/+y1qgj8ATohdC5LntkdV1Af0gr4OxI9j351qKrKeq1ope69TY6yO8sHpQKBgEp4v+TSNjMQP05EhrmacJoMKKcZzGaxcB7r2Od4wfYW9mTvjkqlcH7iUumILaTydCUBqQ3Rl1G1QhSb5okoU7IXpeBhtCXM8u8s3Vo3FkyEs0O2zMkH5rNUCamVQeWawaUNAOUMZUgcGUqK5JzUATQuqjnxVO5XOqZwpftNCUxtAoGAXgbgwBygm5X5fc9I5yzvtXrX6Bgg7JV9zlBouBMlIJ1c4n01r8R5MKB3fDSezsSkapyRn02/TE4UE4MfHgN6qOcGz93BV1hEYlf29JTaEnWUpGq+kN9ZnHyXFgpc7OftdqyUGp9aDXiGpNIvO2MwVUaxilVeekNxNL2v6UkJ7WkCgYEA1/RDQEdSEuSvB1mEbF+xxHYXOmwMkPLIV8oz5/thiTISYOKEmULpOYvby6DMD+ulsRHfHm9BX6tQ7PBzYZJdUl9bP4ta8RAreK2D4M/bg0N+6okqQ1NcS4rCwIRAvIYpKp1xd2gBSu1cu5nf52p396b1vFQI9V34Fnu67yBovH8=",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//应用ID
		'app_id' => "2017030806117382",

		//异步通知地址,只有扫码支付预下单可用
		'notify_url' => "http://www.baidu.com",

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3"
);