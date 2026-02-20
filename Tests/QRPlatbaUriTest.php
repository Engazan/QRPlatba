<?php

use Defr\QRPlatba\QRPlatba;
use PHPUnit\Framework\TestCase;

class QRPlatbaUriTest extends TestCase
{
    public function create($accountNumber, $variableSymbol, $message, $amount)
    {
        $qrPayment = new QRPlatba();

        $qrPayment->setAccount($accountNumber)
            ->setVariableSymbol($variableSymbol)
            ->setMessage($message)
            ->setAmount($amount);

        return $qrPayment->getDataUri();
    }

    public function testDataUriRaiffeisenBank()
    {
        $uri = $this->create('973789052/5500', '200000408', 'Test', 1500);
        $this->assertEquals(
            'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATwAAAE8AQMAAABny59FAAAABlBMVEUEAgT8/vxJvsdeAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAB70lEQVRoge2ZUXIDMQhDfTOuzpF6A7dGEpt2OsH96ZecZNfA40crk8xk7bv1sQz+N5irVnxFGYpWZJwoVDU4ggep1Hn3JhcCVg3OYEpfah7QWfm6GrwGj3chN16rewz+AdxJjVt3GdrgHagKFN8w7dnz/mNSGPwd5FdO/v5i1eAEajH1qI4Nl8EJfA56KfwSs696DE4gcsGT/2rgzYGaBi9AlvHRpeoka2vwAgyc/+h92TeXfJzL4AgWVObkRrLTxbgZHEEwJbaUXrArCydpcAKTWGyJjnGAEaAmgzNY0iZNutghgsIbnEAGhKG0pkJAfznc4Dtw52qfouWpby2DE0iXdgFGRQO8HAYvQB31ngHVgHFas6AqBkdww7uVWDr18QhfD8PgDB6hmQl4F+LTz2nwBsx4GZzyak1Q2BjWNTiBYKS71IbSmAUnb3AC88nDrwrY8M24Bt+B5VSo3Zd+BGVrgxfg41qovaJ5udjgBVgToFXP2kv1cnLwDwiDA9hvnfwiS/yFMWtwArUo/NnVXTEegMEJzFa1ZGaQ1VO2Lf0NjiBEDuoMI7foig3OYJ37gGFx9GnlpQnQvwAMzmAzsOszBM7H4J9A6Bzk99NocAY3s5sKU+MOTtHgCOqQy6pnCCi582UAGHwH3i2D/w1+An2rO6pYzXUhAAAAAElFTkSuQmCC',
            $uri
        );
    }

    public function testDataUriKB()
    {
        $uri = $this->create('115-214740207/0100', '200000408', 'Test', 1500);
        $this->assertEquals(
            'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATwAAAE8AQMAAABny59FAAAABlBMVEUEAgT8/vxJvsdeAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAB9klEQVRoge2ZTXYCMQyDfTNf3UfqDVJiyZ7w+PF005XSgUnsL10IRcDD1r3xYwL/GwzL4Y+7Pyrhee157Ae7Akdwtx/PCT5uXG7Gr6XAGdxIdnz3MMdidVfgXXDXYd72bk4E/g2EU/O0r5zjIfA2yBOfNaN5N2oJviSFwPcg33Li/R+7AiewRtipNIPVqytwAgNW7RhdjNA0cxnaBY6gMS8rOftCBEB3gTPYXF3Qmf4FLnACy6dtW7iWa3QEzmAa9FKWeZAuDoP4V1II/AoWBxCrQtEVOIE49OXexKIt24YWOIHQF7B1BhgHNwucQWsi2MgaU4AVgRPIk5+l4IaysIH2/AIp8CsYXkedA1lAqWu3wAlcFNeDfejvVUcMCLwBruvUr0t9LOBcgTPYFqXiUJmSG3LBBY7g6ryk5rAsAL4eS+AEQt51qYxNOPqsH9+QBH4CrR2akp+aw8SbFjiBcO7iPWBgP9y89yyBIwhrGm1a61YfU4ETSEnbrYW2ibMjcAKrn+7NepmVr0SaWOAdkLDZEZ3IVtSPT6QCP4A8/V4H/pI8NzEBBI6gv8idyJEGAm+Bh85RM0MVAbCOD+wCB5DC24k63fv0i4/A7+Cpb9Qck6cfFgV+ANFZh3OhPN+X8h8JHEHLUZKnV7m14BA4g/eGwP8GfwEBQhLhTHSmrgAAAABJRU5ErkJggg==',
            $uri
        );
    }

    public function testDataUriFio()
    {
        $uri = $this->create('2100199001/2010', '200000408', 'Test', 1500);
        $this->assertEquals(
            'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATwAAAE8AQMAAABny59FAAAABlBMVEUEAgT8/vxJvsdeAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAB20lEQVRoge2VQXYDIQxDfTOuzpF6A1okGci8vJhushLJTMD+ZiGEE+Nu/ITBb4M9MNro7e8TGnOOkJYGS7BNQRknoq9qmTVYgz31RWgJn3G8Dd6D8iqO4Iga/Be4hU7dZWiDl2AadgnMwqENnp3C4HswQqm3H2UNVmCODKX6gTaQWYMVuC96e158FqLGYAUy1iTyaVpJjy0MVqCERQ+gvKxaJKYGKxB/RAHRj2wCnITBGhzSXDJL+qzTARgswVQ5UWg8HhODFahVyLt7Rt8yZvAClEvxnNMmsefSYAXOcMJDSvMIYGhFDFYgBO3yKd79tQLDYAlOoTMh8ZsK1kEYLMHTufiB0Gyn6AVIGyxBOLXvi08Xj2VnNFeDN2DwykPybAJCgkdhsAI7k0cbIM4d6FuDNZik/Hq2A/WCmTFYgX3Ho50LFbwY1+AnMCLb6H6dPXV0gxcgI2laKi0+XWzwAuxsn5H3ffTUf29h8AJkaso7BafcLMCYS4MVmCOl3WuW89dgBW5Ve6TG6wRmMQ7BYAm2U14kWUCxtTZYg7j3bd3/kfbVUSBr8BpcDO0aEjvwGLwH06mUf61RaLAGxzgaQN+NFFsEj8FgCeYlZwqmXX5VXW8GK/BuGPw2+AvMtptKAmE2WQAAAABJRU5ErkJggg==',
            $uri
        );
    }
}
